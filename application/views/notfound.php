<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset=UTF-8>
        <meta name=viewport content="width=device-width,initial-scale=1">
        <title>404 Not Found</title>
        <link href=<?= base_url('assets/notfound/main.5968d5567149ddb664c5.css')?> rel=stylesheet>
    </head>
    <body style="width: 100%; height:100vh;">
        <main>
            <div class=message>
                <strong>404</strong>
                <p class=title>LOOKS LIKE YOU ARE LOST IN THE SPACE</p>
                <p class=message-text>The page you are looking for might be removed or is temporally unavailable</p>
                <?php if($this->session->userdata('id_users')){?>
                    <a href="<?= base_url('dashboard')?>">
                        <button class=button>GO BACK HOME</button>
                    </a>
                <?php }else{?>
                <a href="<?= base_url()?>">
                    <button class=button>GO BACK HOME</button>
                </a>
                <?php }?>
            </div>
        </main>
        <div class=box-astronaut>
            <img src=<?= base_url('assets/notfound/imgs/astronaut.e2b60a65821122a3377a8f0f01d68285.svg')?> alt="">
        </div>
        <script src=<?= base_url('assets/notfound/main.5f4bd23c1c2dccd1184c.bundle.js')?>></script>
    </body>
</html>