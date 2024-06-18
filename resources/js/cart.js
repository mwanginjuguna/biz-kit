function initializeCart() {
    localStorage.setItem('cart', '');
    console.log("cart initialized");
}

function getCart() {
    console.log('getting cart items.')
    return localStorage.getItem('cart');
}

// let cartItems = getCart() ? JSON.parse(getCart()) : [];

function addToCart(productId, quantity=1) {

    // Check if the productId already exists in the cart by finding its index using findIndex.
    const existingCartItemIndex = cartItems.findIndex(item => item.product_id === productId);
    console.log('Existing index checked. result is: ', existingCartItemIndex);

    // add new cart item if the cart is empty or undefined
    if (existingCartItemIndex !== -1) {
        // Update quantity if product already in cart
        cartItems[existingCartItemIndex].quantity += quantity;
    } else {
        // Add new item
        cartItems.push({
            product_id: productId,
            quantity: quantity
        });
    }
    // set local cart
    localStorage.setItem('cart', JSON.stringify(cartItems));
    //flash('Added Successfull.', `You have added one item into cart.`, 'success')

}
