# ![alt text](https://raw.githubusercontent.com/ajrmzcs/antonioramirez.co/master/public/img/ar-brand.png) [http://antonioramirez.co](https://antonioramirez.co "My personal Blog")

This is the source code of my Personal Blog
---

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This is an open source personal blog, build in PHP with Laravel.
---
## Installation

### Step 1

> Please note that PHP 7.2 is required.

Clone the repository and install Composer & NPM dependencies.

```bash
git clone https://github.com/ajrmzcs/antonioramirez.co.git [YourProjectDirectory]
cd [YourProjectDirectory] 
composer install && npm install
npm run dev
```

### Step 2
Set your .env database credentials, email driver domain and secret, and algolia search credentials

### Step 3
In case you want to add sample data use the following command and follow the instructions:

```bash
php artisan insert:sample-data
```
This will create sample users, categories and posts for you to start testing the code.
---
