#Exchange Rates
A Laravel package to convert one currency rate to other. <br>
This package uses [exchangerate.host](exchangerate.host) to convert currency rates.<br>

##Installation
`composer required hassanrazadev/exchange-rates`

##Usage
**Get latest rates**
<br>
<br>
`Currency::convert();`

**Set base currency**
<br>
<br>
`Currency::convert('USD');`

**Set target currency**
<br>
<br>
`Currency::convert('USD', 'PKR');` 
<br>
<br>
`Currency::convert('USD', ['PKR', 'EUR']);`

**Get historical data**
<br>
<br>
`Currency::convert('USD', ['PKR', 'EUR'], '2020-02-27');`
