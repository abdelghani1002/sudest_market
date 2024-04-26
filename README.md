<p align="center">
  <img src="https://raw.githubusercontent.com/abdelghani1002/sudest_market/main/public/app_logo.png" width="100" />
</p>
<p align="center">
    <h1 align="center">SUDEST_MARKET</h1>
</p>
<p align="center">
	<img src="https://img.shields.io/github/license/abdelghani1002/sudest_market?style=flat&color=0080ff" alt="license">
	<img src="https://img.shields.io/github/last-commit/abdelghani1002/sudest_market?style=flat&logo=git&logoColor=white&color=0080ff" alt="last-commit">
	<img src="https://img.shields.io/github/languages/top/abdelghani1002/sudest_market?style=flat&color=0080ff" alt="repo-top-language">
	<img src="https://img.shields.io/github/languages/count/abdelghani1002/sudest_market?style=flat&color=0080ff" alt="repo-language-count">
<p>
<p align="center">
		<em>Developed with the software and tools below.</em>
</p>
<p align="center">
	<img src="https://img.shields.io/badge/Laravel-F7DF1E.svg?style=flat&logo=Laravel&logoColor=black" alt="Lravel">
	<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black" alt="JavaScript">
	<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white" alt="PHP">
	<img src="https://img.shields.io/badge/Vite-646CFF.svg?style=flat&logo=Vite&logoColor=white" alt="Vite">
	<img src="https://img.shields.io/badge/JSON-000000.svg?style=flat&logo=JSON&logoColor=white" alt="JSON">
	<img src="https://img.shields.io/badge/AJAX-000000.svg?style=flat&logo=AJAX&logoColor=white" alt="AJAX">
</p>
<hr>

## Quick Links

> - [ Overview](#-overview)
> - [ Features](#-features)
> - [ Modules](#-modules)
> - [ Getting Started](#-getting-started)
>
>    - [ Installation](#-installation)
>    - [ Running sudest_market](#-running-sudest_market)
>
> - [ Contributing](#-contributing)
> - [ Acknowledgments](#-acknowledgments)

---

## Overview

Explore Draa Tafilalet's cultural treasures with our online marketplace—a digital haven connecting you to the region's artisanal crafts and culinary delights. From ceramics to spices, each item celebrates our vibrant heritage. Experience convenience with home delivery and pay upon arrival. Join us in supporting local businesses and fostering a sense of community across Morocco.

---

## Features

`features`

---

## Getting Started

***Requirements***

Ensure you have the following dependencies installed on your system:

* **PHP**: `version 8.2.*`

### Installation

1. Clone the sudest_market repository:

```sh {"id":"01HWE9BGP8R5CN489SG0JYK9G3"}
git clone https://github.com/abdelghani1002/sudest_market
```

2. Change to the project directory:

```sh {"id":"01HWE9BGP8R5CN489SG0K76FCT"}
cd sudest_market
```

3. Install the dependencies:

```sh {"id":"01HWE9BGP8R5CN489SG2R3M2SW"}
composer install
npm install
```

4. Setup .env file:

cp .env.example .env

5. Generate key:

```sh {"id":"01HWE9ZJNZ7X017RHBHW211QP8"}
php artisan key:generate
```

6. Setup Database:

```sh {"id":"01HWEBJB91625ABQATZ6JHT5Y6"}
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="DB name"
DB_USERNAME="username"
DB_PASSWORD="password"
```

7. Setup Mail:

```sh {"id":"01HWEBKBXPX5JBZGTNJP52PJYN"}
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="app@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Running sudest_market

Use the following command to run sudest_market:

```sh {"id":"01HWE9BGP8R5CN489SG5PWDFXG"}
php artisan serve
npm run dev
php artisan queue:work
```

---

## Contributing

Contributions are welcome! Here are several ways you can contribute:

- __[Submit Pull Requests](https://github.com/abdelghani1002/sudest_market/blob/main/CONTRIBUTING.md)__: Review open PRs, and submit your own PRs.
- __[Join the Discussions](https://github.com/abdelghani1002/sudest_market/discussions)__: Share your insights, provide feedback, or ask questions.
- __[Report Issues](https://github.com/abdelghani1002/sudest_market/issues)__: Submit bugs found or log feature requests for Sudest_market.

<details closed>
    <summary>Contributing Guidelines</summary>

1. **Fork the Repository**: Start by forking the project repository to your GitHub account.
2. **Clone Locally**: Clone the forked repository to your local machine using a Git client.

```sh {"id":"01HWE9BGP8R5CN489SG9JE6E27"}
git clone https://github.com/abdelghani1002/sudest_market
```

3. **Create a New Branch**: Always work on a new branch, giving it a descriptive name.

```sh {"id":"01HWE9BGP8R5CN489SGAZHZY8S"}
git checkout -b new-feature-x
```

4. **Make Your Changes**: Develop and test your changes locally.
5. **Commit Your Changes**: Commit with a clear message describing your updates.

```sh {"id":"01HWE9BGP8R5CN489SGC582A8R"}
git commit -m 'Implemented new feature x.'
```

6. **Push to GitHub**: Push the changes to your forked repository.

```sh {"id":"01HWE9BGP8R5CN489SGEDRXN56"}
git push origin new-feature-x
```

7. **Submit a Pull Request**: Create a PR against the original project repository. Clearly describe the changes and their motivations.

Once your PR is reviewed and approved, it will be merged into the main branch.

</details>

---
