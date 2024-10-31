<?php include "includes/header.php"?>
    <section>
        <h2>Contactanos</h2>
        <!--    Imagen -->
    </section>

    <section>
        <h2>Llena el Formulario de Contacto</h2>
        <form action="">
            <fieldset>
                <legend>Informacion Personal</legend>
                <div>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" placeholder="Escribe tu Nombre">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Tu@email.com">
                </div>
                <div>
                    <label for="phone">Telefono:</label>
                    <input type="text" name="phone" id="phone" placeholder="555-5555-55">
                </div>
                <div>
                    <label for="msg">Mensaje:</label>
                    <textarea name="msg" id="msg" placeholder="Escibre un Mensaje"></textarea>
                </div>
            </fieldset>
            <fieldset>
                <legend>Informacion Sobre la Propiedad</legend>
                <div>
                    <label for="ventcom">Vende o Compra</label>
                    <select id="ventcom" name="ventcom">
                        <option value="vende">Vende</option>
                        <option value="compra">Compra</option>
                    </select>
                    
                </div>
                <div>
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" id="quantity">
                </div>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <div>
                    <label for="telf">Telefono</label>
                    <input type="radio" name="telf" id="telf">
                    <label for="e-mail">Email</label>
                    <input type="radio" name="e-mail" id="e-mail">
                </div>
                <div>
                    <label for="date">Fecha:</label>
                    <input type="date" name="date" id="date">
                    <label for="hour">Hora:</label>
                    <input type="time" name="hour" id="hour">
                </div>
            </fieldset>
            <div>
                <button>Contactar</button>
            </div>
        </form>
    </section>

<?php include "includes/footer.php"?>
