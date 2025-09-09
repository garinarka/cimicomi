(async function () {
    /**
     * Utility: parse last page number from GitHub Link header
     * returns integer page number or null
     */
    function parseLastPageFromLink(linkHeader) {
        if (!linkHeader) return null;
        // find rel="last"
        const parts = linkHeader.split(',');
        for (const p of parts) {
            const matchRel = p.match(/rel="last"/);
            if (matchRel) {
                const urlMatch = p.match(/<([^>]+)>/);
                if (!urlMatch) continue;
                const url = new URL(urlMatch[1]);
                const page = url.searchParams.get('page');
                return page ? parseInt(page, 10) : null;
            }
        }
        return null;
    }

    /**
     * For each element that has `data-repo="owner/repo"`, fetch GitHub API and populate children by IDs.
     * Expects inside the card elements with these IDs:
     *   repo-owner, repo-name, repo-desc, repo-logo, contributors, issues, stars, forks, repo-link
     *
     * Optional: set data-github-token on the card to use authenticated requests (higher rate limit).
     */
    const cards = document.querySelectorAll('[data-repo]');
    for (const card of cards) {
        const repo = (card.dataset.repo || '').trim();
        if (!repo || !repo.includes('/')) {
            console.warn('Invalid data-repo on card:', card);
            continue;
        }

        const token = (card.dataset.githubToken && card.dataset.githubToken.length)
            ? card.dataset.githubToken
            : (document.querySelector('meta[name="github-token"]')?.content || null);

        const headers = {
            'Accept': 'application/vnd.github.v3+json',
            'User-Agent': 'Laravel-App'
        };
        if (token) {
            headers['Authorization'] = 'token ' + token;
        }

        // scoped selectors inside this card
        const ownerEl = card.querySelector('#repo-owner');
        const nameEl = card.querySelector('#repo-name');
        const descEl = card.querySelector('#repo-desc');
        const logoEl = card.querySelector('#repo-logo');
        const contribEl = card.querySelector('#contributors');
        const issuesEl = card.querySelector('#issues');
        const starsEl = card.querySelector('#stars');
        const forksEl = card.querySelector('#forks');
        const linkEl = card.querySelector('#repo-link');

        try {
            // fetch repo data
            const repoRes = await fetch(`https://api.github.com/repos/${repo}`, { headers });
            if (!repoRes.ok) throw new Error(`Repo fetch failed: ${repoRes.status}`);

            const repoData = await repoRes.json();

            // populate basic fields
            if (ownerEl) ownerEl.textContent = (repoData.owner?.login ?? 'unknown') + '/';
            if (nameEl) nameEl.textContent = repoData.name ?? repo;
            if (descEl) descEl.textContent = repoData.description ?? '';
            if (logoEl) {
                // use first two chars of name as avatar text
                logoEl.textContent = (repoData.name ?? repo).substring(0, 2).toUpperCase();
            }
            if (starsEl) starsEl.textContent = repoData.stargazers_count ?? 0;
            if (forksEl) forksEl.textContent = repoData.forks_count ?? 0;
            if (issuesEl) issuesEl.textContent = repoData.open_issues_count ?? 0;
            if (linkEl) {
                linkEl.href = repoData.html_url ?? `https://github.com/${repo}`;
                // if linkEl is an <a>, also set visible text fallback (if you want)
                // linkEl.textContent = repoData.full_name ?? repo;
            }

            // Contributors: handle pagination safely
            // We request 1 item per page and inspect Link header to determine total count.
            if (contribEl && repoData.contributors_url) {
                const contribUrl = new URL(repoData.contributors_url);
                // add per_page=1 to minimize payload
                contribUrl.searchParams.set('per_page', '1');
                // include anon if you want anonymous contributors counted (optional)
                contribUrl.searchParams.set('anon', 'true');

                const contribRes = await fetch(contribUrl.toString(), { headers });
                if (!contribRes.ok) {
                    // fallback: try fetching first page normally and count (may be partial)
                    const fallback = await fetch(repoData.contributors_url + '?per_page=100', { headers });
                    if (fallback.ok) {
                        const arr = await fallback.json();
                        contribEl.textContent = Array.isArray(arr) ? arr.length : '0';
                    } else {
                        contribEl.textContent = '0';
                    }
                } else {
                    // check Link header for last page
                    const linkHeader = contribRes.headers.get('link');
                    const lastPage = parseLastPageFromLink(linkHeader);
                    if (lastPage !== null) {
                        // If last page is N and per_page=1, total contributors ~= N
                        contribEl.textContent = String(lastPage);
                    } else {
                        // no pagination => get array length (small repos)
                        const arr = await contribRes.json();
                        contribEl.textContent = Array.isArray(arr) ? arr.length : '0';
                    }
                }
            }
        } catch (err) {
            console.error('Error fetching GitHub repo data for', repo, err);
            // set gracefully
            if (ownerEl) ownerEl.textContent = repo.split('/')[0] + '/';
            if (nameEl) nameEl.textContent = repo.split('/')[1] || repo;
            if (descEl) descEl.textContent = '';
            if (logoEl) logoEl.textContent = repo.split('/')[1]?.substring(0, 2).toUpperCase() ?? '--';
            if (contribEl) contribEl.textContent = '—';
            if (issuesEl) issuesEl.textContent = '—';
            if (starsEl) starsEl.textContent = '—';
            if (forksEl) forksEl.textContent = '—';
            if (linkEl) linkEl.href = `https://github.com/${repo}`;
        }
    }
})();