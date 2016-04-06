# Hanzo

Browser and node module for making API requests against [Hanzo](https://api.hanzo.io).

**Please note: This module uses [Popsicle](https://github.com/blakeembrey/popsicle) to make API requests. Promises must be supported or polyfilled on all target environments.**

## Installation

```
npm install hanzo --save
bower install hanzo --save
```

## Usage

### Node

```javascript
var Hanzo = require('hanzo');

var client = new Hanzo();
```

### Browsers

```html
<script src="hanzo/index.js"></script>

<script>
  var client = new Hanzo();
</script>
```

### Options

You can set options when you initialize a client or at any time with the `options` property. You may also override options for a single request by passing an object as the second argument of any request method. For example:

```javascript
var client = new Hanzo({ ... });

client.options = { ... };

client.resource('/').get(null, {
  baseUri: 'http://example.com',
  headers: {
    'Content-Type': 'application/json'
  }
});
```

#### Base URI

You can override the base URI by setting the `baseUri` property, or initializing a client with a base URI. For example:

```javascript
new Hanzo({
  baseUri: 'https://example.com'
});
```

#### Base URI Parameters

If the base URI has parameters inline, you can set them by updating the `baseUriParameters` property. For example:

```javascript
client.options.baseUriParameters.version = 'v3';
```

### Resources

All methods return a HTTP request instance of [Popsicle](https://github.com/blakeembrey/popsicle), which allows the use of promises (and streaming in node).

#### resources.store.id(id)

* **id** _string_

```js
var resource = client.resources.store.id(id);
```

##### GET

Basic Store calls are keyed upon the unique ID of the Store.  As with all calls,
it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.store.id(id).variant.key(key)

* **key** _string_

```js
var resource = client.resources.store.id(id).variant.key(key);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Variant is as simple as passing its ID to the Variant endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Variant JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

It is possible to access the product variants organized under a store by
providing the store's unique identifier and the variant's unique key. As with
all calls, this requires an API key included along with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.store.id(id).product.key(key)

* **key** _string_

```js
var resource = client.resources.store.id(id).product.key(key);
```

##### GET

It is possible to access the products belonging to a store by passing in the
store's unique identifier, followed by the product's unique key.  As with all
calls, this also requires an access key to be included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.site

```js
var resource = client.resources.site;
```

##### POST

This will deploy a new site.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateaSiterequest"
}
```

##### GET

Returns all sites that you are authorized to see.

```js
resource.get().then(function (res) { ... });
```

#### resources.site.id(id)

* **id** _string_

```js
var resource = client.resources.site.id(id);
```

##### DELETE

The only input this requires is the contextual site ID, and it will respond with
200 OK.

```js
resource.delete().then(function (res) { ... });
```

##### PUT

This functionally is a POST/Create command with a contextual site ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/Updateasiterequest"
}
```

##### GET

These site calls are keyed on the SiteId in the Site object. As with all calls,
it also requires an access key to be sent along with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.user.id(id)

* **id** _string_

```js
var resource = client.resources.user.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a User is as simple as passing its ID to the User endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic User calls are keyed upon the unique ID of the User.  As with all calls,
it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateaUserrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid User JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic User calls are keyed upon the unique ID of the User.  As with all calls,
it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.variant.id(id)

* **id** _string_

```js
var resource = client.resources.variant.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Variant is as simple as passing its ID to the Variant endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Variant calls are keyed upon the unique ID of the Variant.  As with all
calls, it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateaVariantrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Variant JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Variant calls are keyed upon the unique ID of the Variant.  As with all
calls, it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.product.id(id)

* **id** _string_

```js
var resource = client.resources.product.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Product is as simple as passing its ID to the Product endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Product calls are keyed upon the unique ID of the Product.  As with all
calls, it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreatingaProductrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Product JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Product calls are keyed upon the unique ID of the Product.  As with all
calls, it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.transaction.id(id)

* **id** _string_

```js
var resource = client.resources.transaction.id(id);
```

##### GET

This is the only call that is available for Transactions, as they are too
directly sensitive to allow to be modified.

```js
resource.get().then(function (res) { ... });
```

#### resources.referrer.id(id)

* **id** _string_

```js
var resource = client.resources.referrer.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Referrer is as simple as passing its ID to the Referrer endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Referrer calls are keyed upon the unique ID of the Referrer.  As with all
calls, it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreatingaReferrerrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Referrer JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Referrer calls are keyed upon the unique ID of the Referrer.  As with all
calls, it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.referral.id(id)

* **id** _string_

```js
var resource = client.resources.referral.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Referral is as simple as passing its ID to the Referral endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Referral calls are keyed upon the unique ID of the Referral.  As with all
calls, it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreatingaReferralrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Referral JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Referral calls are keyed upon the unique ID of the Referral.  As with all
calls, it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.order.id(id)

* **id** _string_

```js
var resource = client.resources.order.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Order is as simple as passing its ID to the Order endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
200.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Order calls are keyed upon the unique ID of the Order.  As with all calls,
it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateanOrderrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Order JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Order calls are keyed upon the unique ID of the Order.  As with all calls,
it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.order.id(id).payments

```js
var resource = client.resources.order.id(id).payments;
```

##### GET

It is possible to get a listing of all the payments on a specific order with
this endpoint.

```js
resource.get().then(function (res) { ... });
```

#### resources.order.id(id).capture

```js
var resource = client.resources.order.id(id).capture;
```

##### POST

The second step of the two-step payment process involves capturing a
pre-authorized payment.  The order ID is required for this step, but it is
returned in the Authorize step (see above).

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

#### resources.form.id(id)

* **id** _string_

```js
var resource = client.resources.form.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion. Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Form is as simple as passing its ID to the Form endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
204.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Form calls are keyed to the unique ID of the form.  As with
all calls, it also requires an API key to be included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateaFormrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Form JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Form calls are keyed to the unique ID of the form.  As with
all calls, it also requires an API key to be included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.form.id(id).submit

```js
var resource = client.resources.form.id(id).submit;
```

##### POST

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "type": "object"
}
```

#### resources.collection.id(id)

* **id** _string_

```js
var resource = client.resources.collection.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Collection is as simple as passing its ID to the Collection endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
204.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Collection calls are keyed to the unique ID of the collection.  As with
all calls, it also requires an API key to be included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateaCollectionrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Collection JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Collection calls are keyed to the unique ID of the collection.  As with
all calls, it also requires an API key to be included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.coupon.id(id)

* **id** _string_

```js
var resource = client.resources.coupon.id(id);
```

##### PATCH

The PATCH method will allow you to replace a given ID's data in a piecemeal
fashion.  Any fields passed in to a PATCH method will be updated with what you
request, while any fields not specified in the JSON will be left alone.

```js
resource.patch().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### DELETE

Deleting a Coupon is as simple as passing its ID to the Coupon endpoint using
the HTTP Delete method. You will not receive a response past the normal HTTP
204.

```js
resource.delete().then(function (res) { ... });
```

##### POST

Basic Coupon calls are keyed upon the unique ID of the Coupon.  As with all
calls, it also requires an access key included with the request.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/CreateaCouponrequest"
}
```

##### PUT

The PUT method will allow you to replace a given ID's data in its entirety.
Passing in valid Coupon JSON (see the POST method), will overwrite any and all
data existing on that ID.

```js
resource.put().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "properties": {}
}
```

##### GET

Basic Coupon calls are keyed upon the unique ID of the Coupon.  As with all
calls, it also requires an access key included with the request.

```js
resource.get().then(function (res) { ... });
```

#### resources.checkout.authorize

```js
var resource = client.resources.checkout.authorize;
```

##### POST

The two-step payment process separates the two steps mentioned in the one-step
payment process, and allows you to authorize a payment, and then capture it at a
later period.  This is useful for pre-orders or other such payments that you do
not wish to collect until shipment.  The basic data needs remain the same, as
Hanzo implicitly creates the Order and User for you, for later use in the
capture portion.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/Authorizerequest"
}
```

#### resources.checkout.charge

```js
var resource = client.resources.checkout.charge;
```

##### POST

The one-step payment process is mostly used for general commerce for immediate
fulfillment/sale.  In general, you must send three things to successfully
complete a charge call: order information, payment information, and user
information. In essence, the one-step payment method takes this information,
authorizes the payment, and, if successful, immediately attempts to capture it.
Any failure in this process will result in a failure of the call.

```js
resource.post().then(function (res) { ... });
```

##### Body

**application/json**

```
{
    "$ref": "#/definitions/ChargeanOrderrequest"
}
```



### Custom Resources

You can make requests to a custom path in the API using the `#resource(path)` method.

```javascript
client.resource('/example/path').get();
```

## License

Apache 2.0
