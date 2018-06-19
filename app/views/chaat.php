<button class="js-open-chat"><img src="images/chat.svg"></button>
<div class="modal-chat">
    <button class="chat-close">Close</button>
    <h2>Mur de la team</h2>
    <div class="chat-messages">
        <div class="chat-message">
            <p>Salut, ça va ?</p>
            <strong>- Paaper</strong>
        </div>

        <div class="chat-message">
            <p>Salut, ça va ?</p>
            <strong>- Paaper</strong>
        </div>

        <div class="chat-message">
            <p>Salut, ça va ?</p>
            <strong>- Paaper</strong>
        </div>
    </div>

    <form action="" class="team-form">
        <label class="options-label" for=""><strong class="required">*</strong> Commentario</label>
        <textarea class="options-textarea chat-text" name="" id="" placeholder="Explicamos brevemente como to podemos ayudar!"></textarea>
        <input type="hidden" class="chat-pseudo" value="<?=$_SESSION['name']?>">

        <button type="submit">Envoyer</button>
    </form>
</div>