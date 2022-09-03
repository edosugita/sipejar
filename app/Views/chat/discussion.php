<?=
$this->extend('templates/users/templates');
$this->section('content');
?>

<main class="content">
    <div class="container p-0">
        <h1 class="h3 mb-3">Discussion</h1>

        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-lg-5 col-xl-3 border-right">

                    <hr class="d-block d-lg-none mt-1 mb-0">
                </div>
                <div class="col-12 col-lg-7 col-xl-9">

                </div>

                <div class="position-relative">
                    <div class="chat-messages p-4">

                        <!--  -->
                        <?php foreach ($chat as $c) : ?>
                            <div class="chat-message-right pb-4">
                                <div>
                                    <p class="fs-4"><?= $user[$c['user_id']]; ?></p>
                                    <div class="text-muted small text-nowrap mt-2"><?= $c['created_at']; ?></div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                    <?= $c['content']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!--  -->

                    </div>
                </div>

                <div class="flex-grow-0 py-3 px-4 border-top">
                    <form action="chat/send" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" value=<?= $user_id; ?> name="user_id" hidden>
                            <input type="text" class="form-control" value=<?= $discussion_id; ?> name="discussion_id" hidden>
                            <input type="text" class="form-control" placeholder="Type your message" name="chat">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
</main>

<?= $this->endSection(); ?>