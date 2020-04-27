<img src="https://raw.githubusercontent.com/ravgeetdhillon/dropilio/master/assets/dropilio-logo.png" alt="Dropilio logo" width="80">

# Dropilio

[![Actions Status](https://github.com/ravgeetdhillon/dropilio/workflows/Keep%20Alive/badge.svg)](https://github.com/ravgeetdhillon/dropilio/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/ravgeetdhillon/dropilio/blob/master/LICENSE)


## About

Dropilio is a REST API service for sending local files as attachments with Twilio Whatsapp API. This leverages the use of Twilio Whatsapp API for Desktop applications such as those built in Electron, GTK, etc.

### How it works

If you are working on a Desktop application, and you want to send a Whatsapp message along with attachments using Twilio Whatsapp API, you must include a link to that attachment as a media resource. For this, your attachment must be somewhere on the Internet. Dropilio solves this problem by uploading your attachment to your Dropbox account and then gets a temporary link that can be used by the Twilio Whatsapp API.

## Features

- Host on your own **Cloud** platform
- **Lightweight** with little bundle size
- Plugin-and-Play as it comes with **REST API**
- **Authentication** using Hash keys
- **Manage dependencies** using Composer
- **One-click deploy** button for Heroku

## How to use it

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

You can deploy Dropilio directly on [Heroku](https://www.heroku.com/) and start using the service within a minute

## Set up

### Requirements

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [A Twilio account](https://www.twilio.com)
- [A Dropbox account](https://www.dropbox.com)

### App Settings

To set up the app properly, you need Twilio and Dropbox credentials. Collect all the config values we need to run the application:

| Config Value | Description |
| - | - |
| Twilio Account Sid | Your primary Twilio account identifier - find this [in the console](https://www.twilio.com/console). |
| Twilio Auth Token | Used to authenticate - find this [in the console](https://www.twilio.com/console). |
| Dropbox App Key | Your primary Dropbox app identifier - find this [in the console](https://www.dropbox.com/developers/apps). |
| Dropbox App Secret | Your primary Dropbox app secret - find this [in the console](https://www.dropbox.com/developers/apps). |
| Dropbox App Token | Your primary Dropbox app authentication - find this [in the console](https://www.dropbox.com/developers/apps). |
| Dropilio App Key | Used to authenticate the requests (Self-generated) |

### Local development

After the above requirements have been met:

1. Clone this repository and `cd` into it

```bash
git clone https://github.com/ravgeetdhillon/dropilio.git
cd dropilio
```

2. Install dependencies

```bash
composer install
```

3. Set your environment variables

4. Run the web app on your localhost

**That's it!**

## Contributing

Dropilio is open source and welcomes contributions. All the issues can be filed here. Any new feature requests are also welcome. All contributions are subject to our [Code of Conduct](https://github.com/ravgeetdhillon/dropilio/blob/master/CODE_OF_CONDUCT.md).

## License

[MIT](https://github.com/ravgeetdhillon/dropilio/blob/master/LICENSE)

## Disclaimer

No warranty expressed or implied. Software is as-is.
