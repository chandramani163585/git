[core]
	repositoryformatversion = 0
	filemode = false
	bare = false
	logallrefupdates = true
	symlinks = false
	ignorecase = true
[remote "origin"]
	url = git@github-mani163585:chandramani163585/ajax-image-upload.git
	fetch = +refs/heads/*:refs/remotes/origin/*
[branch "master"]
	remote = origin
	merge = refs/heads/master


=============================================================

#when prompted enter `id_rsa_user1` as filename
ssh-keygen -t rsa

# ~/.ssh/config
Host user1-github
HostName github.com
Port 22
User git
IdentityFile ~/.ssh/id_rsa_user1

#check original remote origin url
git remote -v
origin git@github.com:user1/my-repo.git

#change it to use your custom `user1-github` hostname
git remote rm origin
git remote add origin git@user1-github:user1/my-repo.git