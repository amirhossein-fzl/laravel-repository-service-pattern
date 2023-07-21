# Laravel repository-service architecture

In this architecture, the business logic of the project is written in the form of different services. The business logic of the application is completely separated from the controller.

The connection with the database is established by the repository. Everything related to the database is written in the repository layer.

Note 1: Repositories are related to models or query builder.
Note 2: Services have a direct relationship with the tank or tanks.
