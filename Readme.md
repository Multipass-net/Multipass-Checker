SQweb - Connection Checker
===

**This script will test the connection from your server to our API.**

Some environments may have issues with the HTTPS connection, due to old versions of PHP or outdated SSL libraries. This simple script will do :

- An HTTP `GET` request from your server to our API ;
- An HTTP `POST` request from your server to our API ;
- An HTTPS `GET` request from your server to our API ;
- An HTTPS `POST` request from your server to our API.

## Instructions

Simply upload this script to your server, and run it via your browser.

For each test, you will either see `Connection Succeeded.` or `Connection Failed.` with a detailed error log.

If you've been asked to use this script by our support, please send the resulting output via email.
