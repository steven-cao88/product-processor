# Product Processor

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This is a sample project about a product processor using Laravel framework.

This project will consume messages from a queue and save (create or update) the messages to an underlying RDBMS table (MySQL). The consumer will need to process the queue concurrently with up to 5 threads/processes depending on
the number of messages in the queue at any one time. The consumer will receive messages that deserailise into a JSON object that is a single instance of a 'product' with the 3 properties listed below:
* product_id - string - primary identifier
* product_name - string (max length 100 chars)
* product_description - string (max length 2000 chars)

The deserialised messages are saved to a the the DB product table named products with the same 3 fields as in the JSON object as well as creat
ed_at & updated_at fields which are both timestamps.

### Built With

* [Laravel](https://laravel.com)



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* Composer (https://getcomposer.org/download/)

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/steven-cao88/product-processor.git
   ```
2. Install Composer packages
   ```sh
   composer install
   ```
3. Generate keys in `.env`
   ```sh
   php artisan key:generate
   ```



<!-- USAGE EXAMPLES -->
## Usage

You can test the scrpt by running command

 ```sh
   php artisan test
   ```

<!-- ROADMAP -->
## Roadmap

* Increase test coverage for queue and rate limited tests
* Provide endpoints for list, show, delete product
* Implement authentication and authorisation



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Steven Cao - mailboxofsteven@gmail.com

Project Link: [https://github.com/steven-cao88/product-processor](https://github.com/steven-cao88/product-processor)