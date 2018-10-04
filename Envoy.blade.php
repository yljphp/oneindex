@servers(['web' => ['root@47.104.184.92']])

@setup
$repertory = "/Code/oneindex/";
$webPath = "/home/wwwroot/php71/domain/onedrive/web/";
@endsetup
@task('deploy', ['on' => 'web'])
cd {{$repertory}}
git pull origin master
chown -R mostwin.mostwin ./*
rsync -avz  {{$repertory}} --delete  --exclude 'cache/'   --exclude '.git/'   {{$webPath}}
@endtask