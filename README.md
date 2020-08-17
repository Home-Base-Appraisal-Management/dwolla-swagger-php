dwolla-swagger-php
=========

The new Dwolla API V2 SDK, as generated by [this fork of swagger-codegen](https://github.com/mach-kernel/swagger-codegen).

Additionally, temporary PHP 7.4 support was added using these replaces:
 - `\$this\->([a-z0-9\_]+) = \$data\["([a-z0-9\_]+)"\]\;` into `\$this->$1 = \$data\["$2"\] ?? null;`

## Version

1.5.1

## Installation

`DwollaSwagger` is available on [Packagist](https://packagist.org/packages/dwolla/dwollaswagger), and can therefore be installed with [Composer](https://getcomposer.org/).

```
composer require dwolla/dwollaswagger
composer install
```

To use, just `require` your composer `autoload.php` file.
```php
require('../path/to/vendor/autoload.php');
```

## Quickstart

`DwollaSwagger` makes it easy for developers to hit the ground running with our API. Before attempting the following, you should ideally create [an application key and secret](https://www.dwolla.com/applications).

### Configuring a client

To get started, all you need to set is the `access_token` and `host` values.

```php
DwollaSwagger\Configuration::$access_token = 'a token';

# For Sandbox
$apiClient = new DwollaSwagger\ApiClient("https://api-sandbox.dwolla.com");

# For production
$apiClient = new DwollaSwagger\ApiClient("https://api.dwolla.com");
```

### List 10 customers

Now that we've set up our client, we can use it to make requests to the API. Let's retrieve 10 customer records associated with the authorization token used.

```php
DwollaSwagger\Configuration::$access_token = 'a token';
$apiClient = new DwollaSwagger\ApiClient("https://api-sandbox.dwolla.com/");

$customersApi = new DwollaSwagger\CustomersApi($apiClient);
$myCusties = $customersApi->_list(10);
```

### Creating a new customer

To create a customer, we can either provide an (associative) `array` with the expected values, or a `CreateCustomer` object.

```php
$location = $customersApi->create([
    'firstName' => 'Jennifer',
    'lastName' => 'Smith',
    'email' => 'jsmith@gmail.com',
    'phone' => '7188675309'
],
[
    'Idempotency-Key' => '9051a62-3403-11e6-ac61-9e71128cae77'
]);
```

#### or

```php
$jenny = new DwollaSwagger\CreateCustomer();
$jenny->firstName = 'Jennifer';
$jenny->lastName = 'Smith';
$jenny->email = 'jsmith@gmail.com';
$jenny->phone = '7188675309'

$location = $customersApi->create($jenny);
```

`$location` will contain a URL to your newly created resource (HTTP 201 / Location header).

## Modules

`DwollaSwagger` contains `API` modules which allow the user to make requests, as well as `models` which are [DAOs](https://en.wikipedia.org/wiki/Data_access_object) that the library uses to serialize responses.

### API
Each API module is named in accordance to ([Dwolla's API Spec](http://docsv2.dwolla.com/) and encapsulates all of the documented functionality.

* `AccountsApi`
* `BusinessclassificationsApi`
* `CustomersApi`
* `DocumentsApi`
* `EventsApi`
* `FundingsourcesApi`
* `KbaApi`
* `LabelsApi`
* `LabelreallocationsApi`
* `LedgerentriesApi`
* `MasspaymentitemsApi`
* `MasspaymentsApi`
* `OndemandauthorizationsApi`
* `RootApi`
* `SandboxApi`
* `TransfersApi`
* `WebhooksApi`
* `WebhooksubscriptionsApi`

----------

API objects take an `ApiClient` argument, which you created [here](##Configuring a client).

##### Example
```php
$documentsApi = new DwollaSwagger\DocumentsApi($apiClient);
```

### Models

Each model represents the different kinds of requests and responses that can be made with the Dwolla API.

* `AccountInfo`
* `Amount`
* `ApplicationEvent`
* `BaseObject`
* `BusinessClassification`
* `BusinessClassificationListResponse`
* `CreateCustomer`
* `CreateFundingSourceRequest`
* `CreateWebhook`
* `Customer`
* `CustomerListResponse`
* `Document`
* `DocumentListResponse`
* `EventListResponse`
* `FundingSource`
* `FundingSourceListResponse`
* `HalLink`
* `Money`
* `Transfer`
* `TransferListResponse`
* `TransferRequestBody`
* `Unit`
* `UpdateCustomer`
* `VerificationToken`
* `VerifyMicroDepositsRequest`
* `Webhook`
* `WebhookAttempt`
* `WebhookEventListResponse`
* `WebhookHeader`
* `WebhookHttpRequest`
* `WebhookHttpResponse`
* `WebhookListResponse`
* `WebhookRetry`
* `WebhookRetryRequestListResponse`
* `WebhookSubscription`

## Changelog

1.5.1
* API schema updated, `CustomersApi` updated to add support for `email` parameter on list customers.

1.4.1
* Fix bug in [#43](https://github.com/Dwolla/dwolla-swagger-php/pull/43) to replace null-coalesce operator with backwards-compatible ternary. 

1.4.0
* Add temporary support fix for PHP 7.4. [Issue #41](https://github.com/Dwolla/dwolla-swagger-php/issues/41). (Thanks @oprypkhantc!)

1.3.0
* Add support for custom headers on all requests. (e.g. [Idempotency-Key](https://docs.dwolla.com/#idempotency-key) header)

1.2.0
* API schema updated, `CustomersApi` updated to support KBA related endpoint.
* New `KbaApi`.
* Existing `Document` model updated.
* New `AnswerKbaQuestionsRequest`, `AnswerKbaQuestionsResponse`, `AnsweredKbaQuestion`, `KbaQuestion.php`, `KbaAnswer` models.

1.1.0
* API schema updated, `CustomersApi` updated to support Labels related endpoints.
* New `LabelsApi`, `LabelreallocationsApi`, and `LedgerentriesApi`.
* Existing `CreateCustomer`, `Customer`, `MassPaymentRequestBody`, `MassPaymentRequestBody`, `Owner`, `Transfer`, `TransferRequestBody` and `UpdateCustomer` models updated.
* New `AddLabelLedgerEntryRequest`, `CreateCustomerLabelRequest`, `Label`, `LabelListResponse`, `LabelReallocation`, `LabelReallocationRequest`, `LedgerEntry`, and `LedgerEntryListResponse` models.

1.0.20
* Fix previously patched issue with parsing Location header in 201 response in ApiClient.

1.0.19
* Patch 201 response in ApiClient.

1.0.18
* Patch controller in CreateCustomer model.

1.0.17
* API schema updated, `CustomersApi` updated to support beneficial owner related endpoints, as well as support added for status filter on Customer search.
* New `BeneficialownersApi`.
* Existing `CreateCustomer`, `CreateFundingSourceRequest`, `Customer`, `FundingSourceBalance`, `TransferFailure`, and `UpdateCustomer` models updated.
* New `Address`, `BeneficialOwnerListResponse`, `CertifyRequest`, `CreateOwnerRequest`, `FullAccountInfo`, `Owner`, `Ownership`, `Passport`, and `UpdateOwnerRequest` models.

1.0.16
* API schema updated, `FundingsourcesApi` updated to support update a funding source. `MasspaymentsApi` and `MasspaymentitemsApi` updated to support filtering by correlationId.
* New `SandboxApi` which is used to simulate bank transfer processing in the Sandbox.
* Existing `CreateFundingSourceRequest`, `FundingSource`, `MassPayment`, `MassPaymentItem`, `MassPaymentItemRequestBody`, `MassPaymentRequestBody`, `Transfer`, `TransferFailure`, and `TransferRequestBody` models updated.
* New `ProcessResult`, `UpdateBankRequest`, and `UpdateJobRequestBody` models.

1.0.15
* Optional parameters set to null.

1.0.14
* Trim trailing slash from host url on initialization.

1.0.13
* Add control over IPV4 and V6 connections.

1.0.12
* API schema updated, `CustomersApi` updated to allow for null limit, offset, and search. Existing `CreateFundingSourceRequest`, `FundingSource`, `HalLink`, `MicroDepositsInitiated`, `Transfer`, and `TransferRequestBody` models updated. New `Clearing` and `FailureDetails` models.
* Fix README example for creating a Customer.

1.0.11
* API schema updated, `WebhooksubscriptionsApi` supports pause a webhook subscription. `FundingsourcesApi` contains support for `removed` parameter on list funding sources.
* Fix getFeesBySource to support deserialization with new `FeesBySourceResponse` model.

1.0.10
* Patch soft delete to deserialize with FundingSource model.

1.0.9
* Add boolean type to fix deserialization

1.0.8
* API schema updated, `FundingSourcesApi` supports balance check endpoint
* Fix transfer failure to support deserialization with new transfer failure model.

1.0.7
* API schema updated, `CustomersAPI` supports Customer search, new softDelete method in `FundingSourcesApi`.

1.0.6
* API schema updated, `TransfersApi` has new endpoints for cancel a transfer and get a transfer's fees, new `OndemandauthorizationsApi`, new `MasspaymentsApi`.
* Existing `Document`, `CreateFundingSourceRequest`, and `TransferRequestBody` models updated, new `MassPayment`, `Authorization`, `UpdateTransfer`, and `FacilitatorFeeRequest` models.

1.0.5
* API schema error fixed, `FundingSource` object now has `_embedded` key to fix serialization issues.

1.0.4
* Avoid use of function names if found in list of PHP reserved words.
* API schema updated, `CustomersApi` has new endpoints for IAV verification.
* Existing `Customer` related models updated, new `VerificationToken` model.
* (release skipped, features in 1.0.5)

1.0.3
* API schema updated, `RootApi` now added.
* Changed `auth_token` to `access_token` in compliance with [RFC-6749](https://tools.ietf.org/html/rfc6749) recommended nomenclature.

1.0.2
* API schema updated, new methods in `FundingsourcesApi`.
* All methods which take Swagger variables in `path` (e.g, `/resource/{id}`) can now be passed a resource URL to make it easier for HAL-styled API consumption.
* More idiomatic response logic for HTTP 201 responses.

1.0.1
* API schema updated, new methods in `CustomersApi` and `TransfersApi`

1.0.0
* Initial release.

## Credits

This wrapper is semantically generated by a fork of [swagger-codegen](http://github.com/mach-kernel/swagger-codegen).
 - [swagger-codegen contributors](https://github.com/swagger-api/swagger-codegen/network/members)
 - [David Stancu](http://github.com/mach-kernel)

## License

Copyright 2018 Swagger Contributors, David Stancu

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
