CompoEcommerceDemo
===========

Ecommerce demo project based on CompoSymfonyCms.

[![Try the demo](https://img.shields.io/badge/try-demo-green.svg)](http://ecommerce.compo-symfony-cms.ru)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

Branch | Travis | Buddy | Site |
------ | ------ | ----- | ---- |
develop| [![Build Status](https://travis-ci.com/comporu/compo-ecommerce-demo.svg?token=o9EfRH4zcftTqZDfmkkz&branch=master)](https://travis-ci.com/comporu/compo-ecommerce-demo) | [![buddy pipeline](https://app.buddy.works/comporu/compo-ecommerce-demo/pipelines/pipeline/142712/badge.svg?token=fc1497672c816787d99074f21845ccc6843d7bb0f1151cd28e3d2d9a99711876 "buddy pipeline")](https://app.buddy.works/comporu/compo-ecommerce-demo/pipelines/pipeline/142712) | http://ecommerce.compo-symfony-cms.ru/ |

## Installation

### Docker

Create .env

```bash
cp .env.dist .env
```

Docker up

```bash
docker-compose up --build -d
```

Install or update composer dependency

```bash
docker-compose exec php composer install
# or
docker-compose exec php composer update
```

Install databases

```bash
docker-compose exec php bin/console compo:core:install
```

Install demo data

```bash
docker-compose exec php bin/console compo:ecommerce-demo:install
```

Assetic dump

```bash
docker-compose exec php bin/console assetic:dump --env=prod
```

Create ElasticSearch index

```bash
docker-compose exec php bin/console fos:elastica:populate -vvv --no-debug --max-per-page=1000
```

Restart services

```bash
docker-compose restart php
docker-compose restart nginx
```

Visit https://localhost/

Admin https://localhost/admin

Default login/password for dev environment: ecommerce/ecommerce

Default login/password for admin: admin/admin


## Documentation

Check out the documentation on the [http://docs.compo-symfony-cms.ru/en/latest/](http://docs.compo-symfony-cms.ru/en/latest/)

## Support

If you think you found a bug or you have a feature idea to propose, feel free to open an issue
**after looking** at the [contributing guide](CONTRIBUTING.md).

## License

This package is available under the [MIT license](LICENSE).
