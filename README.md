# DefaultPage

This repository provides a simple to use default page. Default is to display:

```
COMING SOON
probably ...
domain.tld
```

If configured correctly, nonexistant subdomains redirect to the main `domain.tld` and then show up the default page if even this domain isn't configured.

By creating a `.env`-file, one can configure the basic contents of the shown up default page:

```env
HEADLINE=COMMING SOON # defines the first line of the default page
TEXT=probably ... # defines the second line of the page
BACKGROUNDCOLOR="#05454C" # background-color of the page
COLOR="#ffffff" # color of font and road sign
```
