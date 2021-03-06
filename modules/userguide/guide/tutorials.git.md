# Working With Git

Kohana uses [git](http://git-scm.com/) for version control and [github](http://github.com/kohana) for collaboration. This tutorial will show you how to use git and github to build a simple application.

## Initial Structure

[!!] This tutorial will assume that your web server is already set up, and you are going to create a new application at <http://localhost/gitorial/>.

Using your console, change to the empty directory `gitorial` and run `git init`. This will create the bare structure for a new git repository.

Next, we will create a [submodule](http://www.kernel.org/pub/software/scm/git/docs/git-submodule.html) for the `system` directory. Go to <http://github.com/kohana/core> and copy the Clone URL:

![Github Clone URL](http://img.skitch.com/20091019-rud5mmqbf776jwua6hx9nm1n.png)

Now use the URL to create the submodule for `system`:

~~~
git submodule add git://github.com/kohana/core.git system
~~~

[!!] This will create a link to the current development version of the next stable release. The development version should almost always be safe to use, have the same API as the current stable download with bugfixes applied.

Now add whatever submodules you need. For example if you need the [Database](http://github.com/kohana/database) module:

~~~
git submodule add git://github.com/kohana/database.git modules/database
~~~

After submodules are added, they must be initialized:

~~~
git submodule init
~~~

Now that the submodules are added, you can commit them:

~~~
git commit -m 'Added initial submodules'
~~~

Next, create the application directory structure. This is the bare minimum required:

~~~
mkdir -p application/classes/{controller,model}
mkdir -p application/{config,views}
mkdir -m 0777 -p application/{cache,logs}
~~~

If you run `find application` you should see this:

~~~
application
application/cache
application/config
application/classes
application/classes/controller
application/classes/model
application/logs
application/views
~~~

We don't want git to track log or cache files, so add a `.gitignore` file to each of the directories. This will ignore all non-hidden files:

~~~
echo '[^.]*' > application/{logs,cache}/.gitignore
~~~

[!!] Git ignores empty directories, so adding a `.gitignore` file also makes sure that git will track the directory, but not the files within it.

Now we need the `index.php` and `bootstrap.php` files:

~~~
wget http://github.com/kohana/kohana/raw/master/index.php
wget http://github.com/kohana/kohana/raw/master/application/bootstrap.php -O application/bootstrap.php
~~~

Commit these changes too:

~~~
git add application
git commit -m 'Added initial directory structure'
~~~

That's all there is to it. You now have an application that is using Git for versioning.

## Updating Submodules

At some point you will probably also want to upgrade your submodules. To update all of your submodules to the latest `HEAD` version:

~~~
git submodule foreach
~~~

To update a single submodule, for example, `system`:

~~~
cd system
git checkout master
git fetch
git merge origin/master
cd ..
git add system
git commit -m 'Updated system to latest version'
~~~

If you want to update a single submodule to a specific revision:

~~~
cd modules/database
git fetch
git checkout fbfdea919028b951c23c3d99d2bc1f5bbeda0c0b
cd ../..
git add database
git commit -m 'Updated database module'
~~~


