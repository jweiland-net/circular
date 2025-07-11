# TYPO3 Extension `circular`

[![Packagist][packagist-logo-stable]][extension-packagist-url]
[![Latest Stable Version][extension-build-shield]][extension-ter-url]
[![License][LICENSE_BADGE]][extension-packagist-url]
[![Total Downloads][extension-downloads-badge]][extension-packagist-url]
[![Monthly Downloads][extension-monthly-downloads]][extension-packagist-url]
[![TYPO3 12.4][TYPO3-shield]][TYPO3-12-url]

![Build Status](https://github.com/jweiland-net/daycarecenters/workflows/CI/badge.svg)

Circular is an extension for TYPO3 CMS. It shows you a list of circular records incl.
detail view.

## 1 Features

* Create circular records
    * Assign PDF
    * Assign category
    * Assign department
* List view with pagebrowser
* Detail view with link to download the PDF

## 2 Usage

### 2.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/circular
```

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `circular` with the extension manager module.

### 2.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create a circular records on a sysfolder.
3) Assign plugin "Circular" on a page and select at least the sysfolder as startingpoint.

### FAQ

#### I get an error while invoking mailer engine

Error:

```
DirectMailTeam\DirectMail\Dmailer::ensureCorrectEncoding(): Argument #1 ($inputString) must be of type string, null given
```

`circular` creates recipient records from employee records of `telephonedirectory`.
As `direct_mail` needs a `name` column defined here:

```
return $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['direct_mail']['defaultRecipFields']
```

but `telephonedirectory` does not have such a column, that error message appears.

We can't change that configuration, as that may break your existing recipient configuration
for `tt_address`, `fe_users` and others.

<!-- MARKDOWN LINKS & IMAGES -->

[extension-build-shield]: https://poser.pugx.org/jweiland/circular/v/stable.svg?style=for-the-badge

[extension-downloads-badge]: https://poser.pugx.org/jweiland/circular/d/total.svg?style=for-the-badge

[extension-monthly-downloads]: https://poser.pugx.org/jweiland/circular/d/monthly?style=for-the-badge

[extension-ter-url]: https://extensions.typo3.org/extension/circular/

[extension-packagist-url]: https://packagist.org/packages/jweiland/circular/

[packagist-logo-stable]: https://img.shields.io/badge/--grey.svg?style=for-the-badge&logo=packagist&logoColor=white

[TYPO3-12-url]: https://get.typo3.org/version/12

[TYPO3-shield]: https://img.shields.io/badge/TYPO3-12.4-green.svg?style=for-the-badge&logo=typo3

[LICENSE_BADGE]: https://img.shields.io/github/license/jweiland-net/circular?label=license&style=for-the-badge
