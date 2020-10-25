
# Laravel - AWS Storage Integration
## Upload files to Amazon s3 using Laravel 

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- Create new Laravel project.
- Go to [this link](https://s3.console.aws.amazon.com/s3/home?region=ap-south-1) to set up an S3 bucket. 
- Click on Create Bucket and enter a name (names of the buckets are shared among the entire Amazon S3 network, so if we create a bucket, nobody else can use that name for a new bucket).
- Now we need to create a bucket policy, so we need to go to [this link](https://awspolicygen.s3.amazonaws.com/policygen.html). To generate a proper policy you need to select DeleteObject, GetObject and PutObject.
- Click the Add Statement button and then Generate Policy.
- This json result will be put in the Bucket Policy tab located [here](https://s3.console.aws.amazon.com/s3/buckets/laravel_aws/?region=ap-south-1&tab=permissions). (don't forget to change bucket name).
- Now go [here](https://console.aws.amazon.com/iam/home?region=ap-south-1#/security_credential) to create and get Access Key Id and Secret Access Key to put in .env file.
- In Laravel project, go to the terminal and execute the next command to install the S3 package.
```bash
composer require league/flysystem-aws-s3-v3
```
- Change code as shown in file [web.php](https://github.com/queensherainfotech/laravel_aws_storage/blob/master/routes/web.php),
[WelcomeController.php](https://github.com/queensherainfotech/laravel_aws_storage/blob/master/app/Http/Controllers/WelcomeController.php) 
 and [Welcome.blade.php](https://github.com/queensherainfotech/laravel_aws_storage/blob/master/resources/views/welcome.blade.php)
- After this, just run project in your preferred browser.
