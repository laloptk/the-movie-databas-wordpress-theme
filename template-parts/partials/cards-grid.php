<?php if(isset($cards['results']) && !empty($cards['results'])): ?>
    <div class="cards-grid">
        <?php foreach($cards['results'] as $card_data): ?>
            <?php
                $card = array(
                    'id' => $card_data['id'],
                    'type' => $cards['type'],
                    'date' => $card_data['release_date'],
                    'genre_ids' => $card_data['genre_ids']
                );

                if(isset($card_data['poster_path'])) {
                    $card['image'] = $card_data['poster_path'];
                }

                if(isset($card_data['profile_path'])) {
                    $card['image'] = $card_data['profile_path'];
                }

                if(isset($card_data['title'])) {
                    $card['title'] = $card_data['title'];
                }

                if(isset($card_data['name'])) {
                    $card['title'] = $card_data['name'];
                }

                if(isset($card_data['character'])) {
                    $card['character'] = $card_data['character'];
                }

                

                include(__DIR__ . '/card.php');
            ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>