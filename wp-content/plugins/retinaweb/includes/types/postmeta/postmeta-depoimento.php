<?php

// Resumo **********************************

function field_box_depoimento_resumo()
{
    add_meta_box('depoimento_resumo_id', 'Resumo', 'field_depoimento_resumo', 'depoimento');
}
add_action('add_meta_boxes', 'field_box_depoimento_resumo');

function field_depoimento_resumo($post)
{
?>
    <p><input class="postmeta-depoimento" type="text" name="depoimento_resumo" value="<?php echo get_post_meta($post->ID, 'depoimento_resumo', true); ?>"></p>        
<?php
}

// Descrição **********************************

function field_box_depoimento_descricao()
{
    add_meta_box('depoimento_descricao_id', 'Descrição do Depoimento', 'field_depoimento_descricao', 'depoimento');
}
add_action('add_meta_boxes',  'field_box_depoimento_descricao');

function field_depoimento_descricao($post)
{
    $value1 = get_post_meta($post->ID, 'depoimento_descricao', true);
    wp_editor($value1, 'depoimento_descricao', array('textarea_name' => 'depoimento_descricao'));
}

// SAVE ALL **********************************

function save_postmeta_depoimento($post_id){

    if (isset($_POST['depoimento_resumo'])) {
        $depoimento_resumo = sanitize_text_field($_POST['depoimento_resumo']);
        update_post_meta($post_id, 'depoimento_resumo', $depoimento_resumo);
    } 
    if (isset($_POST['depoimento_descricao'])) {
        $depoimento_descricao = sanitize_text_field($_POST['depoimento_descricao']);
        update_post_meta($post_id, 'depoimento_descricao', $depoimento_descricao);
    }

}
add_action('save_post', 'save_postmeta_depoimento');
