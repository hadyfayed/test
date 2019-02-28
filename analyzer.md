
#### Description:

Create a web application that will analyze customer input and provide some statistics.

#### Example:

String 'football vs soccer' should output:  
f : 1 : before: o after: none  
o : 3 : before: o,t,c after: o,f,s max-distance: 10 chars  
t : 1 : before: b, after: o

#### Runflow:

Step 1. Customer is asked to insert a string (not longer then 255 chars)  
Step 2. Customer submits the data and receives a grid overview with character statistics. column1 - character symbol column2 - how many times character encountered. column3 - sibling character info: character was seen standing before [list of chars], after [list of chars], longest distance between chars is 10 (in case of 2 or more characters).

#### Guidance steps:

- use framework if needed. using composer is a plus  
- Using Db is not required in this assignment  
- Assignment should be implemented using objects arranged into graph  
- Write a phpunit for function that will traverse the graph.
