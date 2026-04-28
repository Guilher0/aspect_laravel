<?php

function benchmark($name, $callback, $iterations = 100000) {
    $start = microtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        $callback();
    }
    $end = microtime(true);
    $duration = $end - $start;
    printf("%-20s: %.6f seconds\n", $name, $duration);
    return $duration;
}

$href = "http://localhost/about";
$routeName = "about";

// Simulation of current logic
// Request::is(ltrim(parse_url($item['href'], PHP_URL_PATH), '/'))
$currentLogic = function() use ($href) {
    $path = parse_url($href, PHP_URL_PATH);
    $trimmed = ltrim($path, '/');
    return $trimmed === 'about';
};

// Simulation of fullUrlIs logic
// request()->fullUrlIs($item['href'])
$fullUrlIsLogic = function() use ($href) {
    return $href === 'http://localhost/about';
};

// Simulation of routeIs logic
// request()->routeIs($item['id'])
$routeIsLogic = function() use ($routeName) {
    return $routeName === 'about';
};

echo "Starting benchmarks (100,000 iterations)...\n";
$currentDuration = benchmark("Current (parse_url)", $currentLogic);
$fullUrlIsDuration = benchmark("Optimized (fullUrlIs)", $fullUrlIsLogic);
$routeIsDuration = benchmark("Optimized (routeIs)", $routeIsLogic);

$improvementFullUrl = ($currentDuration - $fullUrlIsDuration) / $currentDuration * 100;
printf("Improvement (fullUrlIs): %.2f%%\n", $improvementFullUrl);

$improvementRouteIs = ($currentDuration - $routeIsDuration) / $currentDuration * 100;
printf("Improvement (routeIs): %.2f%%\n", $improvementRouteIs);
