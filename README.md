# rujukan-pasien-masyarakat-miskin

[![Join the chat at https://gitter.im/rujukan-pasien-masyarakat-miskin/Lobby](https://badges.gitter.im/rujukan-pasien-masyarakat-miskin/Lobby.svg)](https://gitter.im/rujukan-pasien-masyarakat-miskin/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/rujukan-pasien-masyarakat-miskin/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rujukan-pasien-masyarakat-miskin/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/rujukan-pasien-masyarakat-miskin/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rujukan-pasien-masyarakat-miskin/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/rujukan-pasien-masyarakat-miskin/v/stable)](https://packagist.org/packages/bantenprov/rujukan-pasien-masyarakat-miskin)
[![Total Downloads](https://poser.pugx.org/bantenprov/rujukan-pasien-masyarakat-miskin/downloads)](https://packagist.org/packages/bantenprov/rujukan-pasien-masyarakat-miskin)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/rujukan-pasien-masyarakat-miskin/v/unstable)](https://packagist.org/packages/bantenprov/rujukan-pasien-masyarakat-miskin)
[![License](https://poser.pugx.org/bantenprov/rujukan-pasien-masyarakat-miskin/license)](https://packagist.org/packages/bantenprov/rujukan-pasien-masyarakat-miskin)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/rujukan-pasien-masyarakat-miskin/d/monthly)](https://packagist.org/packages/bantenprov/rujukan-pasien-masyarakat-miskin)
[![Daily Downloads](https://poser.pugx.org/bantenprov/rujukan-pasien-masyarakat-miskin/d/daily)](https://packagist.org/packages/bantenprov/rujukan-pasien-masyarakat-miskin)


Cakupan Pelayanan Kesehatan Rujukan Pasien Masyarakat Miskin Menurut Kabupaten/Kota

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/rujukan-pasien-masyarakat-miskin:dev-master
```
- Latest release:

## download via github
```bash
$ git clone https://github.com/bantenprov/rujukan-pasien-masyarakat-miskin.git
```
#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\RujukanPasienMiskin\RujukanPasienMiskinServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=rujukan-pasien-miskin-assets
$ php artisan vendor:publish --tag=rujukan-pasien-miskin-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
    {
        path: '/dashboard',
        components: {
        main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
        title: "Dashboard"
        }
    },
    //== ...
    {
        path: '/dashboard/rujukan-pasien-miskin',
        components: {
            main: resolve => require(['./components/views/bantenprov/rujukan-pasien-miskin/DashboardRujukanPasienMiskin.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
            title: "Rujukan Pasien Masyarakat Miskin"
        }
    }
    //== ...
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
    //== ...
    {
        path: '/admin/dashboard/rujukan-pasien-miskin',
        components: {
          main: resolve => require(['./components/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinAdmin.view.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Rujukan Pasien Masyarakat Miskin"
        }
    }
    //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
            name: 'Dashboard',
            link: '/dashboard',
            icon: 'fa fa-angle-double-right'
        },
        {
            name: 'Entity',
            link: '/dashboard/entity',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
            name: 'Rujukan Pasien Masyarakat Miskin',
            link: '/dashboard/rujukan-pasien-miskin',
            icon: 'fa fa-angle-double-right'
        },
  ]
},
{
  name: 'Admin',
  icon: 'fa fa-lock',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      icon: 'fa fa-angle-double-right',
      child: [
        {
            name: 'Home',
            link: '/admin/dashboard/home',
            icon: 'fa fa-angle-right'
        },
        //== ...
        {
            name: 'Rujukan Pasien Masyarakat Miskin',
            link: '/admin/dashboard/rujukan-pasien-miskin',
            icon: 'fa fa-angle-double-right'
        }
      ]
    },
  ]
}
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

//== Rujukan Pasien Masyarakat Miskin
import RujukanPasienMiskin from './components/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskin.chart.vue';
Vue.component('echarts-rujukan-pasien-miskin', RujukanPasienMiskin);

import RujukanPasienMiskinKota from './components/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinKota.chart.vue';
Vue.component('echarts-rujukan-pasien-miskin-kota', RujukanPasienMiskinKota);

import RujukanPasienMiskinTahun from './components/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinTahun.chart.vue';
Vue.component('echarts-rujukan-pasien-miskin-tahun', RujukanPasienMiskinTahun);

import RujukanPasienMiskinAdminShow from './components/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinAdmin.view.vue';
Vue.component('admin-view-rujukan-pasien-miskin-tahun', RujukanPasienMiskinAdminShow);

import RujukanPasienMiskinBar01 from './components/views/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinBar01.vue';
Vue.component('rujukan-pasien-miskin-bar-01', RujukanPasienMiskinBar01);

import RujukanPasienMiskinBar02 from './components/views/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinBar02.vue';
Vue.component('rujukan-pasien-miskin-bar-02', RujukanPasienMiskinBar02);

//== mini bar charts
import RujukanPasienMiskinBar03 from './components/views/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinBar03.vue';
Vue.component('rujukan-pasien-miskin-bar-03', RujukanPasienMiskinBar03);

import RujukanPasienMiskinPie01 from './components/views/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinPie01.vue';
Vue.component('rujukan-pasien-miskin-pie-01', RujukanPasienMiskinPie01);

import RujukanPasienMiskinPie02 from './components/views/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinPie02.vue';
Vue.component('rujukan-pasien-miskin-pie-02', RujukanPasienMiskinPie02);

//== mini pie charts
import RujukanPasienMiskinPie03 from './components/views/bantenprov/rujukan-pasien-miskin/RujukanPasienMiskinPie03.vue';
Vue.component('rujukan-pasien-miskin-pie-03', RujukanPasienMiskinPie03);
```
