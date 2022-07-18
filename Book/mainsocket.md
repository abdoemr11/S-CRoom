Smart Classroom depend mainly on the concept of real-time communication between students and their professor, this brings 
many challengs and obstacles. 
In this chapter we will go through how we used many web standard to achive full-duplex bidirectional communication that 
are used in the smart classroom, we will begin with broad discussion of different way to achive this funciontality
and the advantages and disadvantages of each approach. 

After that we will move to different internet
protocol like xmpp that are built upon websocket and see how they are implemented
and how different application tweak them for their need. Then we will
discuss how we implemented simple version of xmpp [RFC 6120] [1] 
standard core to meet our requirement. Finally will go through 
implementaion of this protocol using [php ratchet library] [2] 
and discuss various software engineering aspects.

## Bidirectional Stateful Communication
The internet began with Web 1.0  which refers to the first stage of the World Wide Web evolution. Earlier, there were only a few content creators in Web 1.0 with a huge majority of users who are consumers of content. Personal web pages were common, consisting mainly of static pages hosted on ISP-run web servers, or free web hosting services.

This approach continue to rule even when Web 2.0 came out we still
have high-end servers which contain multiple dataset and clients 
who use these server to obtain the information they need for example
when you want to search google.com the process goes as follow
--image--

We call this appraoch 
This is stateless one directional connection between you
and google, you send google request and the server respond.

Till now everything looks great but how about when we need to keep 
an active connection with the server where data can flow in both direction 
in same time in real-time like messengers application. The request response pipeline that we have
discussed so far is not the right solution to this dilemma, Next we will
see possiple answer to this quesetion.

### WebSockets
The WebSocket protocol, described in the specification RFC 6455, provides a way to exchange data between browser and server via a persistent connection. The data can be passed in both directions as “packets”, without breaking the connection and the need of additional HTTP-requests.

Great use cases for WebSockets includes:

· Chat Applications

· Multiplayer Games

· Collaborative Editing

· Social Feeds

· Location-based Applications
![](D:\3enginnering\elect4\term2\project\S-CRoom\Book\socketImages\socketuri.jpeg)

### Server Sent Events
The Server-Sent Events specification describes a built-in class EventSource, that keeps connection with the server and allows to receive events from it.

Similar to WebSocket, the connection is persistent.

But there are several important differences:

| WebSocket                                                    | EventSource                              |
|--------------------------------------------------------------|------------------------------------------|
| Bi-directional: both client and server can exchange messages | 	One-directional: only server sends data |
| Binary and text data	                                        | Only text                                |
| WebSocket protocol	                                          | Regular HTTP                             |

### Long polling
Long polling is the simplest way of having persistent connection with server, that doesn’t use any specific protocol like WebSocket or Server Side Events.

Being very easy to implement, it’s also good enough in a lot of cases.

Regular Polling
The simplest way to get new information from the server is periodic polling. That is, regular requests to the server: “Hello, I’m here, do you have any information for me?”. For example, once every 10 seconds.

In response, the server first takes a notice to itself that the client is online, and second – sends a packet of messages it got till that moment.

That works, but there are downsides:

Messages are passed with a delay up to 10 seconds (between requests).
Even if there are no messages, the server is bombed with requests every 10 seconds, even if the user switched somewhere else or is asleep. That’s quite a load to handle, speaking performance-wise.
So, if we’re talking about a very small service, the approach may be viable, but generally, it needs an improvement.

Long polling
So-called “long polling” is a much better way to poll the server.

It’s also very easy to implement, and delivers messages without delays.

The flow:

--image--


A request is sent to the server.
The server doesn’t close the connection until it has a message to send.
When a message appears – the server responds to the request with it.
The browser makes a new request immediately.
The situation when the browser sent a request and has a pending connection with the server, is standard for this method. Only when a message is delivered, the connection is reestablished.
If the connection is lost, because of, say, a network error, the browser immediately sends a new request.

In conclusion WebSocket provide the best solution to achieve real-time
bidirectional communication efficiently. It didn't depend on certain
browser or environment moreover it didn't wast bandwidth for 
necessary operations.

## WebSocket and Socket 
Before moving on we should devote a little time to clarify a misconception that often arise when taking about
WebSocket and its relation with Socket. In fact they are totaly different things, Socket is the low level mechanism
that internet use on the world wide web. Sockets work at the upper layers of the Internet protocol (IP) stack, known as the transport layer, where data is passed from an application down to the network via the operating system. When an application on the computer wishes to send and receive data from a network connection, it asks the operating system to open an Internet socket. The socket is set up consisting of the protocol information, such as user datagram protocol (UDP) or transmission control protocol (TCP), as well as the sending and receiving addresses of both computers and the IP port number for the connection. It is also possible for an Internet socket to be created that bypasses the operating system and sends the raw packets without first letting the computer's operating system deal with the additional socket information.

![socket and OSI model](D:\3enginnering\elect4\term2\project\S-CRoom\Book\socketImages\WinsockNetworkModel.jpg)

On the other hand, WebSockets are more than just plain sockets. They use a framing protocol which requires a handshake and then exchanges messages masked by XORint them with a 32bit random number. For more information, [read the RFC which standardizes them.](https://www.rfc-editor.org/rfc/rfc6455)

The reason for this additional encoding layer is that allowing a web browser to create arbitrary socket connections would open various security problems. You could, for example, make visitors to your website connect to arbitrary mailservers via SMTP and make them send spam without the user realizing. That's why the protocol was designed in a way that any server-sided applications need to implement it intentionally before they can be used from web browsers.

We can summarize this section on the following image:

![](D:\3enginnering\elect4\term2\project\S-CRoom\Book\socketImages\SocketWebSocket.png)

## SocketIO
Socket.IO is a JavaScript library built on top of WebSocket… and other technologies. In fact, it uses WebSockets when available, but it’s ready to fall back to other technologies such as
Flash Socket, AJAX Long Polling, AJAX Multipart Stream, and many more; that allows Socket.IO to be used in contexts where WebSockets are not supported.
![](D:\3enginnering\elect4\term2\project\S-CRoom\Book\socketImages\socketvswebscoket1.jpeg)
![](D:\3enginnering\elect4\term2\project\S-CRoom\Book\socketImages\socketvswebscoket2.jpeg)
### So if Socket.IO is perfect why not use it instead of websocket?
As with all tech, choosing the right one means being clear on your ambitions for your product. Socket.IO does make many things easier in comparison to setting up sockets yourself, but there are limitations and drawbacks in addition to the scaling issue mentioned above.

The first is that the initial connection is longer compared to WebSockets. This is due to it first establishing a connection using long polling and xhr-polling, and then upgrading to WebSockets if available.

If you don’t need to support older browsers or GUI and aren’t worried about client environments which don’t support WebSockets you may not want the added overhead of Socket.IO. You can minimise this impact by specifying to only connect with WebSockets. This will change the initial connection to WebSocket, but remove any fallback.


## XMPP
After we have choosing web standard that we will use in our Smart Classroom
we need to choose suitable protocol for comuunication between the server
and the other nodes in the system. One of the best known communication 
protocol is XMPP which is short for Extensible Messaging & Presence Protocol
open standard that supports near-real-time chat and instant messaging by governing the exchange of XML data over a network.

XML, or Extensible Markup Language, provides a framework for storing and organizing plain text data within documents so that the data can be easily interpreted by a wide variety of network endpoints regardless of their hardware or software configuration. XMPP allows XML data, in the form of short snippets called stanzas, to be reliably sent from one endpoint to another using the internet’s Transmission Control Protocol (TCP), passing through an intermediary server along the way.
XMPP has many standards that organize their operator, The core one is rfc6120
which desribe the main functionality of the protocol.
### functional summary of XMPP 
The purpose of XMPP is to enable the exchange of relatively small pieces of structured data (called "XML stanzas") over a network between any two (or more) entities. XMPP is typically implemented using a distributed client-server architecture, wherein a client needs to connect to a server in order to gain access to the network and thus be allowed to exchange XML stanzas with other entities (which can be associated with other servers). The process whereby a client connects to a server, exchanges XML stanzas, and ends the connection is:

1- Determine the IP address and port at which to connect, typically based on resolution of a fully qualified domain name 2)  
2 - Open a Transmission Control Protocol [TCP] connection  
3 - Open an XML stream over TCP  
4 - Preferably negotiate Transport Layer Security [TLS] for channel encryption  
5-  Authenticate using a Simple Authentication and Security Layer [SASL] mechanism  
6 - Bind a resource to the stream  
7 - Exchange an unbounded number of XML stanzas with other entities on the network  
8 - Close the XML stream (Section 4.4)  
9 - Close the TCP connection

Within XMPP, one server can optionally connect to another server to enable inter-domain or inter-server communication. For this to happen, the two servers need to negotiate a connection between themselves and then exchange XML stanzas; the process for doing so is:

1 - Determine the IP address and port at which to connect, typically based on resolution of a fully qualified domain name  
2 - Open a TCP connection  
3 - Open an XML stream  
4 - Preferably negotiate TLS for channel encryption  
5 - Authenticate using a Simple Authentication and Security Layer [SASL] mechanism  
6 - Exchange an unbounded number of XML stanzas both directly for the servers and indirectly on behalf of entities associated with each server, such as connected clients  
7 - Close the XML stream  
8 - Close the TCP connection

## How Watsapp use XMPP
One of the famous application that use XMPP standard is Whatsapp but
they spend great efforts at customizing and editing the standard
to meet their requirements giving a good example that we will follow
in our project.
### FunXMPP
WhatsApp uses a protocol which is a slimmed-down version of XMPP but
as we have said before
it is a messaging protocol using XML as its syntax. A simple example of an XMPP message would be:
```xml
<message to="34123456789@s.whatsapp.net" type="text" id="message-1417651059-2" t="1417651059">
   <body>Test</body>
</message>
```
But apparently the creators of WhatsApp thought this was too bloated and found a way to express XMPP messages using only a few bytes, which they called FunXMPP. Since WhatsApp is intended for mobile devices which often lack a good internet connection, it is logical they wanted as few overhead as possible. Using FunXMPP they achieved that, while still using a standard internet protocol.
### So how does FunXMPP accomplish this?
First of all, all keywords are assigned a byte. In the above example there are a lot of keywords which are common in xmpp (eg message, from, type, text).

If you can replace those by just one byte, it would reduce a lot of overhead. FunXMPP uses a HashTable for this, containing most (if not all) keywords.

Given the syntax \xnn for one byte with the hexadecimal value nn, the above example could be reduced to:
```
<\x59 \xa5="01234567890@\x91" \xa7="\xa2" \x44="message-1417651059-2" \xa1="1417651059">
    <\x12>Test</\x12>
</\x58>
```
Keeping in mind that \xnn stands for just one byte, this is already a significant reduce in size. Note that all remaining ascii values (eg 1417651059, Test, message-1417651059-2) cannot be replaced by anything because they are variable (ie can be set by the user).

XML is a human readable format employing tags that must be opened and closed. Is this really necessary for a computer to read an XML structure? The creators of FunXMPP must have thought the same thing because the other method of decreasing the size of messages is the encoding of the XML structure as a few bytes.

The only thing that remains now is the XML structure. In FunXMPP this structure is expressed as a set of lists. A list is designated by a \xf8 byte. After this \xf8 byte comes a byte with the number of items the list contains. Things that count as one item here are: the tag name, keys, values and the body.

In general: a list followed directly by a list means there are several nodes at the same level and the first list is not a tag or anything visible in the XML.

#### Token MapLookup
```
0x03 => 'account',
0x04 => 'ack',
0x05 => 'action',
0x06 => 'active',
0x07 => 'add',
0x08 => 'after',
0x09 => 'all',
0x0a => 'allow',
0x0b => 'apple',
0x0c => 'auth',
0x0d => 'author',
0x0e => 'available',
0x0f => 'bad-protocol',
0x10 => 'bad-request',
0x11 => 'before',
0x12 => 'body',
0x13 => 'broadcast',
0x14 => 'cancel',
0x15 => 'category',
0x16 => 'challenge',
0x17 => 'chat',
0x18 => 'clean',

```
### Example of WhatsApp Registration Flow
WhatsApp registration process is very confusing or no official document is available for guidance . Request tracking using traffic monitoring tools has revealed following truth about registration process.  Below is the simplified version of process flow.

![](D:\3enginnering\elect4\term2\project\S-CRoom\Book\socketImages\funxmpp.png)

## XMPP in SmartClassroom
The first customization we made to XMPP protocol is that we use
JSON file base instead of XML. JSON (JavaScript Object Notation) is a lightweight data-interchange format. It is easy for humans to read and write. It is easy for machines to parse and generate. It is based on a subset of the JavaScript Programming Language Standard ECMA-262 3rd Edition - December 1999. JSON is a text format that is completely language independent but uses conventions that are familiar to programmers of the C-family of languages, including C, C++, C#, Java, JavaScript, Perl, Python, and many others. These properties make JSON an ideal data-interchange language.

The biggest advantage of JSON over XML is that XML has to be parsed with an XML parser. JSON can be parsed by natively by any programming language
and you don't have to write custom logic to parse it.  
Another advantage is the size, XML has much larger size due to
repeated and unnecessary tags that are not exist in JSON that results in
huge boast in performance and network bandwidth.
Next we will discuss the customized connection sequence that we applied.

### Main connection sequence
The client has to perform the following step to utilize the server
operations:  
1- Use IP address and port to connect the socket server.  
2- perform two-way handshake using json encoded instructions.  
3- wait for commands from the server in a JSON sanitized format.   
    a - when a command came, perform the operations requested from the server.  
    b - send message to the server containing the results of the operation over
JSON sanitized format. 
4- send Commands to the server in a JSON santizied format.
6- close the connection.  

In the next few lines we will discuss each of these operations in a more details

#### Operation 1
The client needs to connect to the server using IP address and Port
these may be fixed system or dynamically changed. In the latter case
the client need to consult a DNS server to get the needed credentials.

#### Operation 2
The client need to advertise itself to the server to inform it about
its physical properties like device id and the client role. The server
then check if the client had previously advertised itself if so return
an error message, else identify the client then send it confirmation
message.

#### Operation 3 && Operation 4
The two opertation is main building block of the system. The server and
the client can communicate to each other in real-time bidirectional tunnel.  
The clients can also use the server as a gateway to communicate with
other clients either they have the same role or not.

## WebSocket Implementation
So far we have discussed theoretical aspect of websocket in our 
Smart Classroom project. Next we will take about how we implemented
the websocket server using Ratchet PHP library.  
Ratchet is a loosely coupled PHP library providing developers with tools to create real time, bi-directional applications between clients and servers over WebSockets.  
### Ratchet main features
1- Open-souce:  
Ratchet is community driven not a proprietary of certain company or enterprise. 
It is also free compared to other paid solutions.  
2- Event-driven:  
After understanding "the new flow" - event driven programming, compared to traditional HTTP request/response - writing any application on top of Ratchet becomes fast and easy.  
3- Structured Component:  
The core of Ratchet is made up of Components. Each component implements a version of the ComponentInterface. If you follow that link you can see each of the classes that implement ComponentInterface.

Each class is instantiated when the script is launched, then enters an event loop, where I/O listens and calls the class on top of it. (it does not trigger a global event, it passes the event on to one class attached to [below] it).

An event is triggered at the top of the table (seen below) from a client on the other side of the socket. The client connection associated with the event then propagates up the structure along with any information sent.

Each class defines which interface it accepts, then propagating its own events. This structure allows developers to add or subtract class components to create different functionality. For example, one may want to add a logging component between WebSocket and WAMP to log raw JSON messages received by the client.

Below is an example of an Application put together using various components. You can see how by adding more layers, Components are able to extend and further define raw data into more specific events. As seen below WAMP accepts a data event, it then parses that data (JSON) and propagates its own events based on the data received.


|Component Class|	Event| triggered by Client (JavaScript)|
|I/O (socket transport)|	open|	close|	data|	error|
|HTTP Protocol Handler|	open|	close|	data|	error|
|WebSocket Protocol Handler|	open|	close|	data|	error|
|Session Provider|	open|	close|	data|	error|
|WAMP Protocol Handler|	open|	close|	publish|	subscribe|	unsubscribe	call|	prefix|	error|


--table here--
https://web.archive.org/web/20220509192025/http://socketo.me/docs/design

### Message Format
The standard JSON message format is as follow:  
```json

{
  "action"     :  "xxxxx",
  "to"         : "xxxxx",
  "from"       : "xxxxx",
  "device_id": "xxxxx",
  "execute"    : {
  }
}

```
If we compare it to the standard XMPP XML such as 
```xml
<message to="34123456789@s.whatsapp.net" type="text" id="message-1417651059-2" from="1417651059">
   <body>Test</body>
</message>
```
We will find out that that fields ``form, to, device_id`` correspond
to ``from, to, id`` respectively, whereas `action` act as `type`
and ``execute`` as `body`.  

The actual value of these fields is related directly to the application
but first let us devote more time at details of system design. 


The users of the application fall into three categories students, professors,
admins.  
Admin should use Websocket server to add new students into the system.  
Professor should use the server to verify the students record attanedance, 
make test and manipulate other information in the session.  
Students are the main user of the system, Our Smart Classroom target
them mainly to enhance their education experience.





[1]: https://xmpp.org/rfcs/rfc6120.html
