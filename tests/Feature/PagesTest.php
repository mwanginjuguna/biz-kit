<?php

test('about us page is displayed', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
});

test('contact page is displayed', function () {
    $response = $this->get('/contact');

    $response->assertStatus(200);
});

test('blog page is displayed', function () {
    $response = $this->get('/blog');

    $response->assertStatus(200);
});

test('products page is displayed', function () {
    $response = $this->get('/products');

    $response->assertStatus(200);
});

test('cart page is displayed', function () {
    $response = $this->get('/cart');

    $response->assertStatus(200);
    $response->assertSee('Cart');
});
