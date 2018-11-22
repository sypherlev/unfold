# Unfold

Unfold is a code generator used to create new business domain sections for use in the Chassis framework.

### Usage

From the project root, run:

`bin/unfold <section_name> <type>`

Architect will attempt to generate Action, Service, and Responder class files of the correct type in `/src/Domain/<Section_name>`.

`<type>` must one of the following: `cli`, `web`, or `api`.