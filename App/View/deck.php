<?php $this->layout('template', ['title' => 'Poker Chance Calculator']) ?>

<div class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Poker</h3></div>
                <div class="card-body">
                    <form method="POST" action="/poker">
                        <?php echo $selectedCard;?>

                        <div>Selected Card: <strong><?= $ranks[$rank] ?> of <?= $suits[$suit] ?> (<?= $suit . $rank ?>)</strong></div>
                        <div>Count of remaining cards in the deck: <span class="badge badge-secondary"><?php echo count($deck) ?></span></div>
                        <div>Chance of getting selected card: <span class="badge badge-secondary"><?php echo $chance ?></span></div>
                        <?php
                        if ($drawnCards) {
                            ?>
                            <div>Attempts number is: <strong><?= count($drawnCards) ?></strong></div>
                            <?php
                            foreach ($drawnCards as $drawnCard) {
                                echo '<input type="hidden" name="drawnCards[]" value="' . $drawnCard . '">';
                            }
                        }
                        if ($deck) {
                            foreach ($deck as $card) {
                                echo '<input type="hidden" name="deck[]" value="' . $card . '">';
                            }
                        }
                        ?>
                        <input type="hidden" name="suit" id="suit" value="<?= $suit ?>">
                        <input type="hidden" name="rank" id="rank" value="<?= $rank ?>">
                        <input type="hidden" name="selected" id="selected" value="<?= $selectedCard ?>">
                        <button name="draw" value="1" type="submit" class="btn btn-primary mt-2">Draw Card</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if ($drawnCards): ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Drawn cards:</h3></div>
                <div class="card-body bg-secondary">
                    <div class="row">
                        <?php foreach ($drawnCards as $drawnCard) {
                            $card = \App\Model\CardCollection::instance();
                            $style = $card->getCardStyle($drawnCard);
                            echo '
                                <div class="col-md-1 col-sm-2 p-1" style="color:'.$style['color'].';">
                                    <div class="card">
                                        <div class="card-header p-0 pr-2 text-right"><i class="fas '.$style['icon'].'"></i></div>
                                        <div class="card-body p-1 text-center">'.$style['number'].'</div>
                                        <div class="card-footer p-0 pl-2 text-left"><i class="fas '.$style['icon'].'"></i></div>
                                    </div>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark"><h3 class="text-center text-light">Documentation</h3></div>
                <div class="card-body">
                    <p class="card-text"><?php echo markDown('poker', true);?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function(event){
    var end = document.getElementById('selected').value;
    if (end == true){
      alert('you did it');
      window.location.href =  "poker";
    }
  });
</script>