# Omnipay: InterKassa
[Any.Money](https://any.money) payment processing driver for the Omnipay PHP payment processing library.

[![Latest Stable Version](https://poser.pugx.org/webtoucher/omnipay-anymoney/v/stable)](https://packagist.org/packages/webtoucher/omnipay-anymoney)
[![Total Downloads](https://poser.pugx.org/webtoucher/omnipay-anymoney/downloads)](https://packagist.org/packages/webtoucher/omnipay-anymoney)
[![Daily Downloads](https://poser.pugx.org/webtoucher/omnipay-anymoney/d/daily)](https://packagist.org/packages/webtoucher/omnipay-anymoney)
[![Latest Unstable Version](https://poser.pugx.org/webtoucher/omnipay-anymoney/v/unstable)](https://packagist.org/packages/webtoucher/omnipay-anymoney)
[![License](https://poser.pugx.org/webtoucher/omnipay-anymoney/license)](https://packagist.org/packages/webtoucher/omnipay-anymoney)

## Installation

The preferred way to install this library is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require webtoucher/omnipay-anymoney "*"
```

or add

```
"webtoucher/omnipay-anymoney": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

The following gateways are provided by this package:

* Any.Money

```php
    $gateway = \Omnipay\Omnipay::create('AnyMoney');
    $gateway->setCheckoutId('[CHECKOUT_ID]');
    $gateway->setSignKey('[SIGN_KEY]');
```

The first step is prepairing data and redirecting to Any.Money.

```php
    $request = $gateway->purchase([
    ]);
    $response = $request->send();
    if ($response->isRedirect()) {
        $response->redirect();
    }
```

There is the notify request handler.

```php
    $request = $gateway->completePurchase($_POST);
    $response = $request->send();
    $orderId = $response->getTransactionId(); // You can check this order and mark it as paid.
    if ($response->isSuccessful()) {
        // Your handler
    } else {
        // Your handler
    }
```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/webtoucher/omnipay-anymoney/issues).
