# Receiving freshping.io notification on Telegram
Use [freshping.io](https://freshping.io) webhook to send notification through Telegram App when website is down

## How to use

Create your [telegram bot](https://core.telegram.org/bots#3-how-do-i-create-a-bot). 

For receiving notification on your telegram account, group or channel, you you need to know those **chat_id**.
Get your **chat_id** adding @RawDataBot to your group


Create webhook in your [freshping.io](https://freshping.io) `setting > integrations > Webhook`

### deploy without docker
Clone this repo
`git clone https://github.com/saderi/freshping-telegram`

Run php composer to install requirement
`composer  install`

Make copy of config-sample.php as config.php and update it.

### deploy with docker

Customize environment variables for your deploy and remember to publish th port *2015*

## Contribution
Fork it. I will be very grateful. If you have an idea, put it in issue section.
