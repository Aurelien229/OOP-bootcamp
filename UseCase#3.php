<?php

$content = array(
    array('type' => 'article', 'title' => 'PHP Basics', 'text' => 'Learn the fundamentals of PHP programming.'),
    array('type' => 'article', 'title' => 'Breaking News: New Technology Unveiled', 'text' => 'Exciting developments in the tech industry!'),
    array('type' => 'ad', 'title' => 'Special Offer!', 'text' => 'Limited-time discount on our products.'),
    array('type' => 'vacancy', 'title' => 'Web Developer Position', 'text' => 'Join our team and create amazing web experiences.')
);


foreach ($content as $item) {
    $title = $item['title'];
    $text = $item['text'];

    switch ($item['type']) {
        case 'ad':
            $title = strtoupper($title);
            break;
        case 'vacancy':
            $title .= ' - apply now!';
            break;
        case 'article':

            if (strpos($title, 'Breaking News') !== false) {
                $title = 'BREAKING: ' . $title;
            }
            break;
    }

    echo '<div>';
    echo '<h2>' . htmlspecialchars($title) . '</h2>';
    echo '<p>' . htmlspecialchars($text) . '</p>';
    echo '</div>';
}
?>
