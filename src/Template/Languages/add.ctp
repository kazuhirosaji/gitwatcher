<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Repos'), ['controller' => 'Repos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Repo'), ['controller' => 'Repos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="languages form large-10 medium-9 columns">
    <?= $this->Form->create($language); ?>
    <fieldset>
        <legend><?= __('Add language from Github user name') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
