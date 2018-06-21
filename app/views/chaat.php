<button class="js-open-chat"><img src="images/chat-laputaindesamere.svg"></button>
<div class="modal-chat">
    <button class="chat-close"><?php include($path . 'images/x.svg') ?></button>
    <div class="chat-messages">

        <div class="flex flex-row chat-wrapper">
            <div class="chavatar-wrapper">
                <img class="chavatar" src="images/avatars/marie.svg" alt="Profil de Marie">   
            </div>
            <div class="chat-message">
                <strong class="typo2">Marie</strong>
                <p class="typo2">faut se chauffer pr le défi du mois !</p>
            </div> 
        </div>

        <div class="flex flex-row chat-wrapper">
            <div class="chavatar-wrapper">
                <img class="chavatar" src="images/avatars/marie.svg" alt="Profil de Marie">   
            </div>
             <div class="chat-message small">
                <strong class="typo2">Marie</strong>
                <p class="typo2">bientôt next level en plus</p>
            </div> 
        </div>

        <div class="flex flex-row chat-wrapper me">
            <div class="chavatar-wrapper">
                <img class="chavatar" src="images/avatars/<?=$loggedUser->avatar?>" alt="Profil de <?=$loggedUser->name?>">    
            </div>
            <div class="chat-message">
                <strong class="typo2"><?=$loggedUser->name?></strong>
                <p class="typo2">Hello la team ! Prêts à relever le défi du mois ? Jsuis op </p>
            </div> 
        </div>

        <div class="new-chat typo2"><span>Nouveaux messages</span></div>

        <div class="flex flex-row chat-wrapper">
            <div class="chavatar-wrapper">
                <img class="chavatar" src="images/avatars/ariane.svg" alt="Profil de Ariane">    
            </div>
            <div class="chat-message">
                <strong class="typo2">Ariane</strong>
                <p class="typo2">Yessss, j’ai déposé ma boîte ce matin 📦</p>
            </div> 
        </div>
    </div>
    

    <form action="" class="team-form">
        <textarea class="chat-text" name="" id="" placeholder="Un message pour votre team ? 🙊"></textarea>
        <input type="hidden" class="chat-pseudo" value="<?=$loggedUser->name?>">
        <input type="hidden" class="chat-avatar" value="<?=$loggedUser->avatar?>">
        <button type="submit" class="send-message"><img src="images/chat-send.svg"  src="envoyer"/></button>
    </form>
</div>