margarine
====================

margarine is about removing the hectic job you need to do on the onsuccess of every ajax request.
the library targets to simplify the work by binding the dom id to js varibales and directly letting 
the server side script response access those variables.

## Include

* <b>external:</b> jquery ui for the modal server response 
* <b>library:</b> contains the class's to handle the ajax request on the server side
* <b>js:</b> javascript ajax framework


### Example

A basic demo example.

#### making the ajax request <CLIENT SIDE>

                CIS.Ajax.request('url');

-OR-

                CIS.Ajax.request('url', {context: {
                        variable1:$(DOM ID1),
                        variable2:$(DOM ID2),
                        variable3:$(DOM ID3)
                    }});

#### Handling ajax response <SERVER SIDE>
```php

        $this->response->script("console.log('hi');");
        $this->response->send();
-OR-
        $this->response->script("$(context.varibale1).html('<p>Hello there</p>')");
        $this->response->send();

NOTE: the context.varibale1 on the response script will directly write into the the 
dom element whose id was passed to the variable.


Use `confirm` and `dialog` functions of the `Response` library to display dialog in client-side.

