<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $repo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $repo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Repos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="repos form large-10 medium-9 columns">
    <?= $this->Form->create($repo); ?>
    <fieldset>
        <legend><?= __('Edit Repo') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('url');
            echo $this->Form->input('language_id', ['options' => $languages]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
