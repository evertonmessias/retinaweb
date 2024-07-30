<?php

// Resumo **********************************

function field_box_vantagem_resumo()
{
    add_meta_box('vantagem_resumo_id', 'Resumo', 'field_vantagem_resumo', 'vantagem');
}
add_action('add_meta_boxes', 'field_box_vantagem_resumo');

function field_vantagem_resumo($post)
{
?>
    <p><input class="postmeta-vantagem" type="text" name="vantagem_resumo" value="<?php echo get_post_meta($post->ID, 'vantagem_resumo', true); ?>"></p>        
<?php
}

// Descrição **********************************

function field_box_vantagem_descricao()
{
    add_meta_box('vantagem_descricao_id', 'Descrição da Vantagem', 'field_vantagem_descricao', 'vantagem');
}
add_action('add_meta_boxes',  'field_box_vantagem_descricao');

function field_vantagem_descricao($post)
{
    $value1 = get_post_meta($post->ID, 'vantagem_descricao', true);
    wp_editor($value1, 'vantagem_descricao', array('textarea_name' => 'vantagem_descricao'));
}

// SAVE ALL **********************************

function save_postmeta_vantagem($post_id){

    if (isset($_POST['vantagem_resumo'])) {
        $vantagem_resumo = sanitize_text_field($_POST['vantagem_resumo']);
        update_post_meta($post_id, 'vantagem_resumo', $vantagem_resumo);
    } 
    if (isset($_POST['vantagem_descricao'])) {
        $vantagem_descricao = sanitize_text_field($_POST['vantagem_descricao']);
        update_post_meta($post_id, 'vantagem_descricao', $vantagem_descricao);
    }

}
add_action('save_post', 'save_postmeta_vantagem');
