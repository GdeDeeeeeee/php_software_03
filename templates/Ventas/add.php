<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 * @var \Cake\Collection\CollectionInterface|string[] $ejemplars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ventas form content">
            <?= $this->Form->create($venta) ?>
            <fieldset>
                <legend><?= __('Add Venta') ?></legend>
                <?php
                    echo $this->Form->control('ejemplar_id', ['options' => $ejemplars]);
                    echo $this->Form->control('cantidad' , ['min' => 1]);
                    echo $this->Form->control('observaciones');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
