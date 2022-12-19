<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ejemplar $ejemplar
 * @var string[]|\Cake\Collection\CollectionInterface $libros
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ejemplar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ejemplar->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ejemplars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ejemplars form content">
            <?= $this->Form->create($ejemplar) ?>
            <fieldset>
                <legend><?= __('Edit Ejemplar') ?></legend>
                <?php
                    echo $this->Form->control('isbn');
                    echo $this->Form->control('editorial');
                    echo $this->Form->control('precio', ['min' => 0.01]);
                    echo $this->Form->control('stock', ['min' => 1]);
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('libro_id', ['options' => $libros]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
