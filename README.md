# TYPO3 Extension `circular`

![Build Status](https://github.com/jweiland-net/circular/workflows/CI/badge.svg)

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

## Support

Free Support is available via [GitHub Issue Tracker](https://github.com/jweiland-net/circular/issues).

For commercial support, please contact us at [support@jweiland.net](support@jweiland.net).


```
return $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['direct_mail']['defaultRecipFields']
```

but `telephonedirectory` does not have such a column, that error message appears.

We can't change that configuration, as that may break your existing recipient configuration
for `tt_address`, `fe_users` and others.
