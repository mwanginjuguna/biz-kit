function flash(title, message, level = 'success') {
    Swal.fire({title: title, text: message, icon: level});
}

function paid() {
    const a = Object.assign(
        document.createElement('a'),
        {
            href: `/orders/${order_id}`,
            style:"display: none",
        });
    document.body.appendChild(a);
    a.click();

    window.location.href = '/orders/'+order_id;
}
