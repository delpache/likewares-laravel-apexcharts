# ApexCharts package for Laravel

Ce package vous permet de générer des graphiques modernes et interactifs en utilisant la bibliothèque [ApexCharts] (https://apexcharts.com) directement depuis `Laravel` sans interagir avec JavaScript, CSS, etc.

Il couvre tous les [types] (https://apexcharts.com/docs/chart-types/line-chart) et [options] (https://apexcharts.com/docs/options/annotations) de graphiques disponibles dans la bibliothèque `ApexCharts`.

Consultez le projet [Likewares] (https://github.com/likewares-crm-app/likewares-crm-app) pour le voir à l'œuvre.

## Démarrer

### 1. Installer

Exécutez la commande suivante:

```bash
composer require likewares/laravel-apexcharts
```

### 2. Publish

Publication de la configuration

```bash
php artisan vendor:publish --tag=apexcharts
```

### 3. Configure

Vous pouvez modifier les paramètres des graphiques de votre application dans le fichier `config/apexcharts.php`.

## Usage

### Blade

Créez une instance de la classe `Chart` et définissez les données et les options en fonction de vos besoins.

```php
use Likewares\Apexcharts\Chart;

// ...

$chart = (new Chart)->setType('donut')
    ->setWidth('100%')
    ->setHeight(300)
    ->setLabels(['Ventes', 'Dépôt'])
    ->setDataset('Revenu par catégorie', 'donut', [1907, 1923]);
```

Ensuite, incluez le JavaScript (sur chaque page utilisant des graphiques).

```blade
<!-- layout.blade.php -->

<body>
    <!-- ... -->

    @apexchartsScripts
</body>
```

Enfin, appelez les méthodes `container` et `script` à l'endroit où vous souhaitez afficher le graphique.

```blade
<!-- dashboard.blade.php -->

{!! $chart->container() !!}

{!! $chart->script() !!}
```

### Vue

Si vous utilisez Vue et Inertia, installez Apexcharts et son adaptateur Vue 3 :

```bash
npm install --save apexcharts
npm install --save vue3-apexcharts
```

```js
// resources/js/app.js

import VueApexCharts from 'vue3-apexcharts';

createInertiaApp({
    // ...
    setup({el, App, props, plugin}) {
        return createApp({ render: () => h(App, props) })
            .use(VueApexCharts)
            .mount(el);
    },
});
```

Ensuite, créez un simple composant `chart.vue` :

```vue
<!-- components/chart.vue -->

<template>
    <apexchart
        :id="chart.id"
        :key="chart.id"
        :type="chart.type"
        :width="chart.width"
        :height="chart.height"
        :series="chart.series"
        :options="chart.options"
    />
</template>

<script setup>
defineProps({
    chart: Object,
});
</script>
```

Créez une instance de `Chart` et appelez `toVue()` avant de la passer à votre page :

```php
Route::get('dashboard', function () {
    $chart = (new Chart)->setType('...');

    return inertia('dashboard', [
        'chart' => $chart->toVue(),
    ]);
});
```

Enfin, rendez le graphique :

```vue
<!-- pages/dashboard.vue -->

<template>
    <Chart :chart="chart" />
</template>

<script setup>
import Chart from './components/chart.vue';

defineProps({
    chart: Object,
});
</script>
```

## Tests

```bash
composer test
```

## License

The MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.
