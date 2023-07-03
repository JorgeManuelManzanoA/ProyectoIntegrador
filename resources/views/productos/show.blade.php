@extends('layouts.encabezado')

@section('content')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<style>
    body {
        background-color: #e7e7e7;
    }
    .card-body {
        background-color: #f1f1f1;
    }
.card-title {
    font-size: 2rem;
    text-align: center;
}

.card-text {
    font-size: 1.2rem;
}

.card-img {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.card-cont-img {
    padding: 1.6rem;
    padding-top: 1.1rem;
    padding-left: 0rem;
}

.card-cont {
    padding: 1.6rem;
    padding-top: 1.1rem;
    padding-right: 0rem;
}

.card-img img {
    max-width: 100%;
    max-height: auto;
    object-fit: contain;
}

.card-text {
    font-size: 1.2rem;
}

.card-title {
    font-size: 1.6rem;
    padding: 0rem;
    margin-top: 2rem;
    margin-bottom: 2rem;
}

.bton {
    font-size: 1.1rem;
}

.message-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    display: none;
}

.message {
    background-color: #f1f1f1;
    color: #636363;
    font-size: 1.2rem;
    padding: auto;
    padding-top: 1.2%;
    padding-bottom: 1.2%;
    padding-left: 1.1%;
    padding-right: 1.4%;
    border: 1.5px solid #636363;
    border-radius: 0.25rem;
    text-align: center;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.message button {
    margin: auto;
}

.close-btn {
    position: absolute;
    top: -6px;
    font-size: 1.5rem;
    padding-bottom: 3px;
    padding-top: 3px;
    color: #636363;
    cursor: pointer;
    background: transparent;
    border: none;
}

.card-cont {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 65%;
}

.message-container .bton {
    font-size: 1.1rem;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    margin-left: 10px;
    margin-right: 10px;

}

.message-container .bton:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.purchase-btn {
    font-size: 1.1rem;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    margin-left: 10px;
    margin-right: 10px;
}

.purchase-btn:hover {
    background-color: #c82333;;
    border-color: #bd2130;
}

.buy-btn {
    font-size: 1.1rem;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    margin-left: 10px;
    margin-right: 10px;
}

.buy-btn:hover {
    background-color: #c82333;;
    border-color: #bd2130;
    }

    .message-container {
    display: flex;
    justify-content: flex-start;
    display: flex;
    justify-content: center;
    align-items: center;
}

.message {
    text-align: left;
}
.message-text-container {
    margin-left: 8px;
}

.close-btn {
    position: absolute; 
    top: 10px;
    right: 12px;
    font-size: 1.8rem;
    padding: 0;
    color: #636363;
    cursor: pointer;
    background: transparent;
    border: none;
}

.close-btn {
    position: absolute;
    top: -6px;
    font-size: 1.8rem;
    padding-bottom: 3px;
    padding-top: 3px;
    color: #636363;
    cursor: pointer;
    background: transparent;
    border: none;
}

.accept-btn {
        font-size: 1.1rem;
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        margin-left: 10px;
        margin-right: 10px;
    }

    .accept-btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>

</head>
<div class="row mb-2">
    <div class="card-cont mx-auto">
        <div class="row g-0 border card-body rounded overflow-hidden flex-md-row mb-5 shadow-sm h-md-600 position-relative">
            <strong class="d-inline-block mb-2 text-dark card-title">{{ $producto->nombre }}</strong>
            <div class="col-md-8 card-cont d-flex flex-column position-static">
                <p class="card-text">Sobre el producto:</p>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <p class="card-text">Precio: S/.{{ $producto->precio }}</p>
                <p class="card-text">Fecha de entrega: {{ \Carbon\Carbon::now()->addDays(30)->format('Y-m-d') }}</p>
                <div class="card-text d-flex align-items-center mt-auto">
                    <label for="cantidad" class="me-2">Cantidad:</label>
                    <input type="number" id="cantidad" class="form-control" style="width: 110px; margin-right: 20px; font-size: 1.3rem;" min="1" value="1" onfocus="changeBorderColor(this)" onblur="resetBorderColor(this)">
                    <button class="nav-link buy-btn btn btn-blue bton btn-danger">Comprar ahora</button>
                </div>
            </div>
            <div class="col-md-4 d-none card-cont-img d-lg-block">
                <div class="card-img">
                    <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="message-container" id="message-container" style="display: none;">
    <div class="message">
        <button id="close-btn" class="close-btn">&times;</button>
        <h3 id="message-title" style="text-align: center; display: none;">Detalles de la compra</h3>
        <div class="message-text-container">
            <p id="message-text"></p>
        </div>
        <div id="button-container"></div>
        <button class="purchase-btn" id="purchase-message-btn" style="display: none;">Comprar</button>
        <button class="accept-btn" id="accept-btn" style="display: none;">Aceptar</button>
    </div>
</div>
<div class="message-container" id="message-container-now" style="display: none;">
    <div class="message">
        <button id="close-btn-now" class="close-btn">&times;</button>
        <h3 id="message-title-now" style="text-align: center; display: none;">Detalles de la compra</h3>
        <div class="message-text-container">
            <p id="message-text-now"></p>
        </div>
        <div id="button-container-now"></div>
        <button class="purchase-btn" id="purchase-message-btn-now" style="display: none;">Comprar ahora</button>
    </div>
</div>
<div class="message-container" id="message-container" style="display: none;">
      <div class="message">
          <span class="close-btn" id="close-btn">&times;</span>
          <p>¡Felicidades por la compra!</p>
          <button class="bton" id="accept-btn">Aceptar</button>
      </div>
  </div>
  <script>
    const buyBtn = document.querySelector('.buy-btn');
    const purchaseBtn = document.querySelector('.purchase-btn');
    const purchaseMessageBtn = document.querySelector('#purchase-message-btn');
    const messageContainer = document.querySelector('#message-container');
    const messageText = document.querySelector('#message-text');
    const buttonContainer = document.querySelector('#button-container');
    const closeBtn = document.querySelector('#close-btn');
    const acceptBtn = document.querySelector('#accept-btn');

    if (buyBtn) {
        buyBtn.addEventListener('click', showLoginMessage);
    }
    if (purchaseBtn) {
        purchaseBtn.addEventListener('click', purchaseProduct);
    }
    if (purchaseMessageBtn) {
        purchaseMessageBtn.addEventListener('click', purchaseProduct);
    }
    closeBtn.addEventListener('click', hideMessage);
    acceptBtn.addEventListener('click', hideMessage);

    function showLoginMessage() {
        const isLoggedIn = {!! json_encode(Auth::check()) !!};

        if (isLoggedIn) {
            showPurchaseDetails();
        } else {
            showMessage('<p style="font-size: 1.3rem; padding: 0rem; margin-top: 1rem; margin-bottom: 0rem; text-align: center;">Necesitas iniciar sesión para realizar la compra</p>');
            const loginBtn = document.createElement('button');
            loginBtn.textContent = 'Iniciar sesión';
            loginBtn.classList.add('bton');
            loginBtn.addEventListener('click', redirectToLogin);

            const registerBtn = document.createElement('button');
            registerBtn.textContent = 'Registrarse';
            registerBtn.classList.add('bton');
            registerBtn.addEventListener('click', redirectToRegister);

            buttonContainer.appendChild(loginBtn);
            buttonContainer.appendChild(registerBtn);
        }
    }

    function purchaseProduct() {
        const purchaseDetails = `<p style="font-size: 1.3rem; padding: 0rem; margin-top: 1rem; margin-bottom: 0rem; text-align: center;">¡Gracias por su compra!</p>
        <p style="font-size: 1.1rem; padding: 0rem; margin: 0rem; text-align: center;">El pedido llegará pronto</p>`;
        showMessage(purchaseDetails);
        
        purchaseMessageBtn.style.display = 'none';
        acceptBtn.style.display = 'inline-block';
    }

    function showPurchaseDetails() {
        const cantidadInput = document.querySelector('#cantidad');
        const cantidad = cantidadInput.value;
        const precioTotal = cantidad * {{ $producto->precio }};
        const fechaCompra = getCurrentDate();
        const fechaEntrega = getDeliveryDate();

        const userDetails = {!! json_encode(Auth::user()) !!};
        const usuario = userDetails.name;
        const producto = '{{ $producto->nombre }}';
        const precioPorUnidad = '{{ $producto->precio }}';

        const purchaseDetails = `
            <p style="font-size: 1.6rem; padding: 0rem; margin-top: 0rem; margin-bottom: 1.1rem; text-align: center;">Detalles de la compra</p>
            <p>Usuario: ${usuario}</p>
            <p>Producto: ${producto}</p>
            <p>Precio por unidad: S/.${precioPorUnidad}</p>
            <p>Precio total: S/.${precioTotal}</p>
            <p>Fecha de compra: ${fechaCompra}</p>
            <p>Fecha de entrega: ${fechaEntrega}</p>
        `;
        showMessage(purchaseDetails);
        purchaseMessageBtn.style.display = 'inline-block';
        acceptBtn.style.display = 'none';
    }

    function showMessage(text) {
        messageText.innerHTML = text;
        messageContainer.style.display = 'flex';
    }

    function hideMessage() {
        messageText.innerHTML = '';
        messageContainer.style.display = 'none';
        buttonContainer.innerHTML = '';
    }

    function redirectToLogin() {
        window.location.href = '{{ route('login') }}';
    }

    function redirectToRegister() {
        window.location.href = '{{ route('register') }}';
    }

    function getCurrentDate() {
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        let month = currentDate.getMonth() + 1;
        let day = currentDate.getDate();
        month = month < 10 ? '0' + month : month;
        day = day < 10 ? '0' + day : day;
        return `${year}-${month}-${day}`;
    }

    function getDeliveryDate() {
        const currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 30);
        const year = currentDate.getFullYear();
        let month = currentDate.getMonth() + 1;
        let day = currentDate.getDate();
        month = month < 10 ? '0' + month : month;
        day = day < 10 ? '0' + day : day;
        return `${year}-${month}-${day}`;
    }
    function changeBorderColor(element) {
            element.style.borderColor = '#EA8181';
            element.style.boxShadow = '0 0 0 0.2rem #EA8181';
        }
        
        function resetBorderColor(element) {
            element.style.borderColor = '';
            element.style.boxShadow = '';
        }
</script>


@endsection
</html>
