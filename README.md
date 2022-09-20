# WinMerge Website

This are the [PHP](https://www.php.net/) sources from the [WinMerge Website](https://winmerge.org/).

## Subdomains

### Own content

This subdomains contains own content:

 * `manual.winmerge.org`
 * `tour.winmerge.org` *Obsolete*

### Redirects

We use this subdomains for nicer URLs in text files:

| Subdomain        | Target                                                 |
|:-----------------|--------------------------------------------------------|
| bugs             | <https://sourceforge.net/p/winmerge/bugs/>             |
| feature-requests | <https://sourceforge.net/p/winmerge/feature-requests/> |
| forums           | <https://github.com/WinMerge/winmerge/discussions>     |
| lists            | <https://sourceforge.net/p/winmerge/mailman/>          |
| patches          | <https://sourceforge.net/p/winmerge/patches/>          |
| project          | <https://sourceforge.net/projects/winmerge/>           |

## Docker

For local testing you can use [Docker](https://www.docker.com/).

Just type `docker compose up` from the root directory and you can access the website under <http://localhost:8080/>.