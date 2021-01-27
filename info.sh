#System Infomation

#!/bin/sh
echo "Please select one of them[1-4] ..."

#!/bin/sh
echo "Please select to one[1-4] ..."
n = 1
while [n -ne 0]
   do
    echo "1) Which User"
    echo "2) Running Processes"
    echo "3) Permission"
    echo "4) Group"

     read INPUT_STRING

          case $INPUT_STRING in

            1)
                whoami

                    ;;
            2)    ps

                    ;;
            3)
                ls -l

                    ;;
                4)       
                groups

                    ;;
    
          Esac

     read n 
    echo  "press 0 to exit"

    if[n -eq 0]
     then
        break
    fi

done

