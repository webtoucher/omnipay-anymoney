# Omnipay: Any.Money
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
    $gateway->setMerchantId('[MERCHANT_ID]');
    $gateway->setPrivateKey('[PRIVATE_KEY]');
    $this->gateway->setLogger(function ($message, $level = 'info') {
        // Your log handler
    });
```

The first step is prepairing data and redirecting to Any.Money.

```php
    $request = $gateway->purchase([
        'amount' => 100.5,
        'currency' => 'UAH',
        'transactionId' => '100500',
        'isMultiPay' => false,
        'payway' => 'visamc_m',
        'email' => 'user@email.com',
        'notifyUrl' => 'https://notify.url',
        'returnUrl' => 'https://return.url?order=100500',
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
    $orderId = $response->getTransactionId(); // You can check this order and mark it as paid or failed.
    if ($response->isSuccessful()) {
        // Your handler
    } else {
        // Your handler
    }
```

On the return page you can check payment status.

```php
    $request = $gateway->status([
        'transactionId' => $order,
    ]);
    $response = $request->send();
    if ($response->isSuccessful()) {
        // Your handler
        // Maybe you need to check here the status of the order on your side
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
