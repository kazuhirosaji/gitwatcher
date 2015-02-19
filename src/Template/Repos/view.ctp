<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Repo'), ['action' => 'edit', $repo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Repo'), ['action' => 'delete', $repo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Repos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Repo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="repos view large-10 medium-9 columns">
    <h2><?= h($repo->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($repo->title) ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $repo->has('user') ? $this->Html->link($repo->user->name, ['controller' => 'Users', 'action' => 'view', $repo->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($repo->url) ?></p>
            <h6 class="subheader"><?= __('Language') ?></h6>
            <p><?= $repo->has('language') ? $this->Html->link($repo->language->name, ['controller' => 'Languages', 'action' => 'view', $repo->language->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($repo->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($repo->created) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($repo->updated) ?></p>
        </div>
    </div>
</div>
