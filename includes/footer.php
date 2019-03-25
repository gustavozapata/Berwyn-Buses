<footer>
    <div class="footer-links">
        <a href="../view/admin_view.php">Admin</a>
        <a href="about.php">About</a>
        <a href="../content/Assignment_Brief.pdf" target="_blank">Brief</a>
    </div>
    <p><a href="#">Designed and Developed by A14</a></p>
    <div class="contact">
        <p>Contact Us</p><img src="../content/images/chat.png" />
    </div>
    <div id="infoBanner">
        <img src="../content/images/close.png" alt="Close Button">
        <p>We don't use cookies so relax there's nothing to accept</p>
    </div>
</footer>
<style>
    .faded-background {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100vw;
        background-color: rgba(250, 250, 250, 0.8);
    }

    .modal {
        padding: 10px;
        display: none;
        position: absolute;
        top: calc(45vh - 200px);
        left: calc(50% - 125px);
        height: (min-content+20);
        width: 250px;
        border-radius: 8px;
    }

    .modal>.modal-header,
    .modal>.modal-body,
    .modal>.modal-footer {
        padding: 10px;
    }

    .modal>.modal-header {
        width: 100%;
        background-color: rgb(240, 240, 240);
    }

    .modal>.modal-body {
        display: block;
        height: (min-content+20);
        width: 100%;
        background-color: rgb(255, 255, 255);
    }

    .modal>.modal-footer {
        width: 100%;
        background-color: rgb(240, 240, 240);
        display: flex;
        justify-content: flex-end;
    }
</style>
<div class="faded-background">
</div>
<div class="modal">
    <div class="modal-header">
        Contact Us
    </div>
    <div class="modal-body">
        <form action="">
            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name" />
            <br>
            <label for="Email">Email:</label>
            <input type="text" name="Email" id="Email" />
            <br>
            <label for="Message">Message:</label><br />
            <textarea name="Message" rows="10" cols="25" id="Message"></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <button>Send now</button>
    </div>
</div>