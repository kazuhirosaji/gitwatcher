<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Language'), ['action' => 'edit', $language->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Repos'), ['controller' => 'Repos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Repo'), ['controller' => 'Repos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="languages view large-10 medium-9 columns">
    <h2><?= h($language->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($language->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($language->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($language->created) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($language->updated) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Repos') ?></h4>
    <?php if (!empty($language->repos)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Url') ?></th>
            <th><?= __('Language Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Updated') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($language->repos as $repos): ?>
        <tr>
            <td><?= h($repos->id) ?></td>
            <td><?= h($repos->title) ?></td>
            <td><?= h($repos->user_id) ?></td>
            <td><?= h($repos->url) ?></td>
            <td><?= h($repos->language_id) ?></td>
            <td><?= h($repos->created) ?></td>
            <td><?= h($repos->updated) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Repos', 'action' => 'view', $repos->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Repos', 'action' => 'edit', $repos->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Repos', 'action' => 'delete', $repos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repos->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
