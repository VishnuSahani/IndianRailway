let numerals = {
    M: 1000,
    CM: 900,
    D: 500,
    CD: 400,
    C: 100,
    XC: 90,
    L: 50,
    XL: 40,
    X: 10,
    IX: 9,
    V: 5,
    IV: 4,
    I: 1,
};

var convertToRoman = (num) => {
    let newNumeral = "";

    for (let i in numerals) {
        while (num >= numerals[i]) {
            newNumeral += i;
            num -= numerals[i];
        }
    }

    return newNumeral;
}

var SUMMER_PRECAUTION_INFO = [
    {
        "heading": "FIRE SAFETY",
        "data": [
            {
                "info": "The availability of Fire extinguishers in prescribed size and numbers, removal of bushes/ waste from around porta cabins particularly for signalling equipments and DG sets, general clean up and removal of lube oil/ fuel oil from DG set enclosures, maintenance of standby DG sets and switchgear",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_0_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_0_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_0_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_0_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_0_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_0_0"
                    }
                ]
            },
            {
                "info": "Counseling of station masters regarding action to be taken in case of fire detection system alarms and awareness of other staff available at station to operate fire fighting equipments in case of exigencies",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_0_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_0_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_0_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_0_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_0_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_0_1"
                    }
                ]
            }
        ]
    },
    {
        "heading": "TRACK CIRCUITS",
        "data": [
            {
                "info": "Provision and cleaning of drainage system in yards to avoid water accumulation in points and track circuited area. Temporary drains need to be provided wherever required. Cross and longitudinal drains are to be made effective and are cleaned regularly during Monsoon and Rainy Season.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_0"
                    }
                ]
            },
            {
                "info": "Joint inspection of major yards prone to water logging by a team consisting of ADEN, ADSTE, AOM, ADEE and ADMO be carried out and action to be taken to improve the drainage before onset of monsoon. The concerned department shall take necessary action to ensure proper drainage.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_1"
                    }
                ]
            },
            {
                "info": "Joint inspection by SSE/P-Way & SSE/Sig to ensure:",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_2"
                    }
                ],
                "children": [
                    {
                        "info": "Cleaning of ballast and ensuring at least 50 mm clearance of ballast from bottom of rail to avoid leakage of track circuit currents.",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_0"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_0"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_0"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_0"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_0"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_0"
                            }
                        ]
                    },
                    {
                        "info": "ii. Provision of 100% insulated GFN liners and rubber pads in track circuited areas with PSC sleepers.",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_1"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_1"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_1"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_1"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_1"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_1"
                            }
                        ]
                    },
                    {
                        "info": "Replacement of worn out wooden sleepers, if any, and proper packing of ballast/ sleepers below insulated joints.",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_2"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_2"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_2"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_2"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_2"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_2"
                            }
                        ]
                    },
                    {
                        "info": "Removal of vegetation, mud and muck from track circuited portion of the track as well as on either side of tracks and in vicinity.",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_3"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_3"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_3"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_3"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_3"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_3"
                            }
                        ]
                    },
                    {
                        "info": "All insulated nylon pieces of insulated joints, Insulation of stretcher bars & Point rodding are to be intact and replace those in bad condition.",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_4"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_4"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_4"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_4"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_4"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_4"
                            }
                        ]
                    },
                    {
                        "info": "Defective /worn out glued joints are to be replaced before onset of monsoon.",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_5"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_5"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_5"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_5"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_5"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_5"
                            }
                        ]
                    },
                    {
                        "info": "Provision of `.1' clips at all insulated joints on PSC sleepers",
                        "options": [
                            {
                                "type": "textbox",
                                "id": "t_no_use_1_2_6"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_1_2_6"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_1_2_6"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_rectified_date_1_2_6"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_balance_done_1_2_6"
                            },
                            {
                                "type": "textbox",
                                "id": "t_no_attend_cal_1_2_6"
                            }
                        ]
                    }
                ]
            },
            {
                "info": "Track lead Junction Boxes in flood prone areas are raised without infringing SOD, so that water does not enter into them.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_3"
                    }
                ]
            },
            {
                "info": "Adjustment of track circuit parameters to keep track relay pick up voltage within safe working limits.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_4"
                    }
                ]
            },
            {
                "info": "Proper working of track feed charger failure alarm wherever provided.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_5"
                    }
                ]
            },
            {
                "info": "Provision of self-restoring type PPTC fuses at all lightning prone stations.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_6"
                    }
                ]
            },
            {
                "info": "Track circuit /AFTC parameter adjustment is a dynamic process during rainy season i.e. it is not a onetime exercise. It is to be done with utmost care and should be done as per need and at-least just before start of monsoon and immediately after first shower.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_7"
                    }
                ]
            },
            {
                "info": "Checking of all traction bonds in track circuited areas of track and attending deficiencies through Electrical Traction Department.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_8"
                    }
                ]
            },
            {
                "info": "Checking and ensuring proper Earthing for axle counter field equipments & Evaluator.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_9"
                    }
                ]
            },
            {
                "info": "Timely replacement of old rusted track lead bond wires and defective Jumper cables.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_1_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_1_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_1_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_1_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_1_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_1_10"
                    }
                ]
            }
        ]
    },
    {
        "heading": "POINTS",
        "data": [
            {
                "info": "Joint inspections of points & crossing with Engineering (P. Way) staff and immediate compliance of deficiencies noted during inspections.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_0"
                    }
                ]
            },
            {
                "info": "Adjustment of point's rodding, adjustable crank and compensators for rod operated points and lock bar.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_1"
                    }
                ]
            },
            {
                "info": "Testing of all emergency crossovers for their efficient working.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_2"
                    }
                ]
            },
            {
                "info": "Insulation of point machines to be checked. All point motors carbon brush covers shall be sealed with silicon sealant after proper cleaning of commutators. Gear oil shall be filled in gear box and top cover sealed. Proper lacing and wiring, aria greasing of the point machines should be completed. Crank handle contacts should be cleaned. Availability of Gasket and Carbon at point machine to be ensured.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_3"
                    }
                ]
            },
            {
                "info": "At identified water logged and flood prone areas, use of IP67 point motors/ machines be preferably provided, else water proofing of point motors shall be done for the points situated in low lying areas.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_4"
                    }
                ]
            },
            {
                "info": "Lifting of point machines wherever required at identified water logged area.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_5"
                    }
                ]
            },
            {
                "info": "Cable entries to be checked to ensure that the cable is in a healthy condition physically besides meggering and ELD monitoring. All the terminals to be cleaned to avoid deposition of moisture on the accumulated dust, to avoid low insulation.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_6"
                    }
                ]
            },
            {
                "info": "Drills to be conducted for removal, replacing of point motors, detection contact assembly and clamping of points.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_7"
                    }
                ]
            },
            {
                "info": "Spare point motors and contact assemblies shall be kept at stations.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_2_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_2_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_2_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_2_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_2_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_2_8"
                    }
                ]
            }
        ]
    },
    {
        "heading": "SIGNALS:",
        "data": [
            {
                "info": "All signal units shall be examined to check the possibility of water seepage/ leakage inside the Signal Units. Signal units have to be sealed with proper gasket to prevent seepage of moisture /water. All signal unit lamps should be completely sealed including any holes to prevent moisture ingress.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_3_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_3_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_3_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_3_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_3_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_3_0"
                    }
                ]
            },
            {
                "info": "CRUs of the LED Signal are to be applied with moisture super sealants coating, readily available in market to minimize their failures.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_3_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_3_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_3_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_3_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_3_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_3_1"
                    }
                ]
            },
            {
                "info": "Additionally, a plastic cover wherever required shall be provided on the back of Signal units, in case, leakage /seepage persists. After the first showers, the signal units have to be re-examined and appropriate action to be taken to avoid water seepage/ leakage.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_3_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_3_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_3_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_3_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_3_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_3_2"
                    }
                ]
            },
            {
                "info": "Any mechanical discrepancies/ damages in the signal units should be attended to ensure that the unit cover fits properly on the body and the locking arrangement is proper and watertight.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_3_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_3_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_3_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_3_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_3_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_3_3"
                    }
                ]
            },
            {
                "info": "Strengthening of foundations of signal posts/location boxes should be done wherever required.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_3_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_3_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_3_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_3_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_3_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_3_4"
                    }
                ]
            }
        ]
    },
    {
        "heading": "RELAY ROOMS. CABINS AND EQUIPMENT ROOMS:",
        "data": [
            {
                "info": "Based on history of previous years, joint inspection by sectional ADEN and ADSTE should be carried out to identify cabins/Relay room and equipment rooms prone to rain water leakage/ seepage and corrective steps be taken on a war footing.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_4_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_4_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_4_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_4_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_4_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_4_0"
                    }
                ]
            },
            {
                "info": "Damaged/ broken windowpanes and doors etc. should be repaired to prevent water getting into relay rooms/cabins/equipment rooms, which may cause serious damage to the systems.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_4_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_4_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_4_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_4_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_4_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_4_1"
                    }
                ]
            },
            {
                "info": "Ventilations should be cleaned. Aluminum stainless steel wire mesh be replaced wherever required. Broken glasses and structures should be repaired.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_4_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_4_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_4_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_4_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_4_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_4_2"
                    }
                ]
            },
            {
                "info": "Treatment of service buildings to avoid seepage of water in equipment rooms.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_4_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_4_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_4_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_4_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_4_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_4_3"
                    }
                ]
            },
            {
                "info": "Roof over the relay room/battery room /panel room is cleaned to prevent accumulation of water on the roof. Drainpipes are available and cleaned.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_4_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_4_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_4_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_4_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_4_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_4_4"
                    }
                ]
            },
            {
                "info": "Battery rooms, cabin basement etc. are checked and repairs, if required, to be carried out. Entry of water at cabin basement should be prevented.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_4_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_4_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_4_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_4_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_4_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_4_5"
                    }
                ]
            }
        ]
    },
    {
        "heading": "POWER SUPPLY ARRANGEMENT",
        "data": [
            {
                "info": "Working of all stand-by Power Supply arrangements shall be ensured.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_0"
                    }
                ]
            },
            {
                "info": "Working of Auto change-over for Power supplies at Stations, End Goomties, IBS & Auto sections have to be checked and ensured.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_1"
                    }
                ]
            },
            {
                "info": "To ensure the availability of power supply to Signalling System, Diesel Generators wherever provided be checked and should be made functional and kept in good fettle. Adequate quantity of Diesel, Mobil Oil, etc. should be stocked at the stations provided with DO sets. DG sets, general clean up and removal of lube oil/ fuel oil from DO set enclosures, maintenance of standby DO sets and switchgear. Essential spares of DG sets switches shall be made available. Diesel Generators shall he covered under AMC/ Overhauling should be carried out wherever warranted/ required.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_2"
                    }
                ]
            },
            {
                "info": "All IPSs must be checked at SE/SSE's level for running the IPS on backup battery at least for 2 hours, checking the auto change over functions, the functioning of the DC-DC converters, the status of the CVT and inverters, class-B protection against power surge etc. Earthing and all relevant values checked, rectified and to be recorded by SE/SSE concerned. Annual Maintenance Contract for IPS shall be kept in force.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_3"
                    }
                ]
            },
            {
                "info": "Availability and intactness of Class-B & C Surge Protection devices which are wired in a separate wall mountable box shall be checked for their indications, if available.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_4"
                    }
                ]
            },
            {
                "info": "All defective modules of IPS should be repaired and kept ready as spare.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_5"
                    }
                ]
            },
            {
                "info": "Earth leakage on existing power supplies should be removed by isolating the faults and replacing the conductors. ELD indications shall be linked with data logger and data obtained should be studied to isolate and remove the faults quickly.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_6"
                    }
                ]
            },
            {
                "info": "Monitoring of battery chargers through RTU/ SMs to be provided at stations where no S&T staffs is available (IBS).",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_7"
                    }
                ]
            },
            {
                "info": "Ensure the provision of spare battery chargers of different capacity at strategic locations.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_5_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_5_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_5_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_5_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_5_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_5_8"
                    }
                ]
            }
        ]
    },
    {
        "heading": "S&T CABLES",
        "data": [
            {
                "info": "Testing of main, tail and power cables should be completed and low insulation conductors to be transferred on healthy conductor in time.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_0"
                    }
                ]
            },
            {
                "info": "Earth Leakage Detectors, where provided, have to be tested for their working for monitoring for any low insulation of conductors. ELD data to be linked with Data Loggers for effective monitoring.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_1"
                    }
                ]
            },
            {
                "info": "All defective tail cables to be replaced before monsoon. All tail cables at entry of Junction boxes, Location boxes, Signal posts are checked for breakage of insulation. All the earth faults should be removed.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_2"
                    }
                ]
            },
            {
                "info": "Minimum 5% healthy spare conductors are to be made available in each location / Goomty / relay room. These identified spare conductors have to be kept labeled /marked so that restoration time for attending signal failure on account of defective cables can be minimized.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_3"
                    }
                ]
            },
            {
                "info": "All spare conductors must be tested. Spare cable details shall also be recorded in cable core plan and insulation measurement register.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_4"
                    }
                ]
            },
            {
                "info": "Protective works provided for the cables at places like track crossings, culverts, bridges, etc shall be inspected prior to onset of monsoon and special attention has to paid to these protective works soon after the first shower",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_5"
                    }
                ]
            },
            {
                "info": "Drills have to be conducted for all Maintainers and Supervisors in the Section for transferring functions to spare conductors in case working conductors become defective.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_6"
                    }
                ]
            },
            {
                "info": "Quad cable meant for Block should be tested for their insulation resistance, cross talk, loop resistance and db losses. Parameters should be brought within acceptable limits. Position of cable joints should be known accurately and joints repaired if required before onset of rains.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_7"
                    }
                ]
            },
            {
                "info": "Gain of OFC channels used for BPAC/ UFSBI should be adjusted within permissible limits.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_8"
                    }
                ]
            },
            {
                "info": "At locations where HT cables are crossing the track, it may be ensured that special precautions are in place to prevent any accidental leakage of current from these should not damage S&T cables.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_6_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_6_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_6_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_6_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_6_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_6_9"
                    }
                ]
            }
        ]
    },
    {
        "heading": "LOCATION BOXES",
        "data": [
            {
                "info": "It should be ensured that doors of all location boxes are closed properly and there are no extra vents, which may allow entry of water or insects/rodents inside the location boxes.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_7_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_7_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_7_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_7_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_7_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_7_0"
                    }
                ]
            },
            {
                "info": "Any location box lying in low level and likely to flooded should be raised/shifted and protected appropriately.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_7_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_7_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_7_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_7_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_7_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_7_1"
                    }
                ]
            },
            {
                "info": "All the terminals in the location boxes and junction boxes are to be cleaned to avoid low insulation due to moisture deposition on the accumulated dust.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_7_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_7_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_7_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_7_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_7_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_7_2"
                    }
                ]
            },
            {
                "info": "PPTC fuses of specific capacity to be provided for all external fuses in location boxes etc.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_7_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_7_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_7_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_7_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_7_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_7_3"
                    }
                ]
            }
        ]
    },
    {
        "heading": "EARTHING & LIGHTNING PROTECTION DEVICES",
        "data": [
            {
                "info": "Proper Earthing and Lightning Protections are provided as per extant instructions on all the equipments like Block Instruments, IPS, Axle Counters (UAC/DAC/MSDAC), El etc. It should be ensured that all these devices are in proper working order. Defective devices should be identified and replaced.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_8_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_8_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_8_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_8_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_8_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_8_0"
                    }
                ]
            },
            {
                "info": "Earth resistance value of all earthling arrangement should be measured and ensured that it is within permissible limits by adopting necessary measures. Provision of additional Earths or overhauling of Earths may be undertaken wherever warranted",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_8_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_8_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_8_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_8_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_8_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_8_1"
                    }
                ]
            },
            {
                "info": "Earth connection at the Earth bar/location body/equipment side and at the Earthing rod/pipe must be thoroughly cleaned to provide proper connectivity. Rusted bond wires/cables used for Earthing should be replaced.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_8_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_8_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_8_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_8_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_8_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_8_2"
                    }
                ]
            },
            {
                "info": "Provision of 'A' class protection at service building housing EI/IPS/MSDAC and other electronic equipments.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_8_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_8_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_8_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_8_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_8_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_8_3"
                    }
                ]
            },
            {
                "info": "Provision and intactness of Earth resistance of lightening protection devices at each identified place such as IPS, EI, AFTC, Axle Counters etc.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_8_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_8_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_8_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_8_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_8_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_8_4"
                    }
                ]
            }
        ]
    },
    {
        "heading": "OPERATING CUM INDICATION PANEL",
        "data": [
            {
                "info": "40/60 conductor indoor cable between panel and relay room shall be checked for proper working. Sufficient spare cores shall be ensured",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_9_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_9_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_9_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_9_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_9_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_9_0"
                    }
                ]
            },
            {
                "info": "ASMs room shall be attended to prevent water falling on the Operating — Cum Indication panel.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_9_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_9_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_9_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_9_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_9_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_9_1"
                    }
                ]
            },
            {
                "info": "Working of 'Calling On' signals have to be ensured.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_9_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_9_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_9_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_9_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_9_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_9_2"
                    }
                ]
            },
            {
                "info": "Joint Drill has to be conducted with Operating for Emergency operation of Point through Panel, extraction of Emergency Crank Handles and cranking of point machines.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_9_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_9_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_9_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_9_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_9_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_9_3"
                    }
                ]
            },
            {
                "info": "Testing of farthest points & crossings and emergency crossovers to be done for proper working.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_9_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_9_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_9_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_9_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_9_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_9_4"
                    }
                ]
            }
        ]
    },
    {
        "heading": "LEVEL CROSSING GATE",
        "data": [
            {
                "info": "Defective wire insulators, rusted wire ropes and rod insulator are to be replaced.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_0"
                    }
                ]
            },
            {
                "info": "Pipes through which rods or wires run should be cleared regularly.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_1"
                    }
                ]
            },
            {
                "info": "Gate telephones shall be tested and telephone battery shall be replaced if required.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_2"
                    }
                ]
            },
            {
                "info": "Area on either side of road & across the gate tracks to he specifically inspected to ensure that no water is getting accumulated.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_3"
                    }
                ]
            },
            {
                "info": "Sliding booms, wherever provided, shall be kept in working order.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_4"
                    }
                ]
            },
            {
                "info": "Sufficient spares of ELB (Boom, Belt, limit switch, fuses) should be kept ready.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_5"
                    }
                ]
            },
            {
                "info": "It should be checked jointly with Electrical Traction branch that there is no possibility of boom getting entangle with OHE in case of storm /high pressure winds.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_10_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_10_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_10_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_10_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_10_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_10_6"
                    }
                ]
            }
        ]
    },
    {
        "heading": "ELECTRONIC INTERLOCKING",
        "data": [
            {
                "info": "Earthing arrangement as well as Surge and Lightning Protection measures should be checked and to be available as stipulated.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_11_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_11_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_11_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_11_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_11_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_11_0"
                    }
                ]
            },
            {
                "info": "Both Main as well as Standby systems, DC-DC converters, CCIPP and VDU or both the VDUs (as the case may be) should be tested to be in working order. Record of testing should be maintained in a register.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_11_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_11_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_11_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_11_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_11_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_11_1"
                    }
                ]
            },
            {
                "info": "In areas highly vulnerable to lightning, safeguards as per local Railway's practice as decided by PCSTE of the Railway be kept in place to ensure trouble free working of EI during Monsoon.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_11_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_11_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_11_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_11_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_11_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_11_2"
                    }
                ]
            },
            {
                "info": "Emergency panel wherever provided should be kept ready for resuming in event of emergency and these panels have to be located by every SSEs/Headquarters.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_11_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_11_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_11_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_11_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_11_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_11_3"
                    }
                ]
            }
        ]
    },
    {
        "heading": "GENERAL",
        "data": [
            {
                "info": "Sensitive Signalling Equipment like TPWS, SSDAC, MSDAC, EI, IPS, Data Logger, UFSBI, AFTC etc shall be got checked and audited with OEMs and maintenance check list of the equipment shall be complied with.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_0"
                    }
                ]
            },
            {
                "info": "All spare cards of TPWS, EIs, AFTCs and Digital Axle Counters etc. should be checked by putting them in working circuits and thereafter properly stacked.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_1"
                    }
                ]
            },
            {
                "info": "Where overhead lines are in use for slot, block circuits and control circuits, strengthening of posts, checking and replacing broken jumpers, insulators, etc. cutting of vegetation, removal of sag in line wires, etc. be got attended.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_2"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_2"
                    }
                ]
            },
            {
                "info": "Sufficient quantity of spares like fuses, AFTC cards/Tuning units, AWS track magnet/Opto-Coupler card, Relays, Relay groups, Point machines including its parts, various types of Signalling cables, should be stocked at vulnerable stations so as to minimize the restoration time.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_3"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_3"
                    }
                ]
            },
            {
                "info": "Transport facilities (with vehicle and driver) should be made available round the clock at critical locations during monsoon to move the staff at the earliest during emergency.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_4"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_4"
                    }
                ]
            },
            {
                "info": "Ensure the provision of fire alarm/fire extinguisher systems prescribed size and numbers & their proper functioning. Locations where Fire alarm/Smoke Detectors are already provided, testing of the same should be verified.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_5"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_5"
                    }
                ]
            },
            {
                "info": "Earth Leakage Detectors, where provided, have to be tested for their working for monitoring for any low insulation of conductors. The data of ELD to be linked to Data Loggers for effective monitoring.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_6"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_6"
                    }
                ]
            },
            {
                "info": "To ensure the removal of bushes/ waste from around Relay Room /EI Room, Cabins, Porta Cabins particularly for signalling equipments to avoid the fire in case.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_7"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_7"
                    }
                ]
            },
            {
                "info": "Provision of Self restoring type PPTC fuses at all lightning prone stations should be ensured.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_8"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_8"
                    }
                ]
            },
            {
                "info": "Usage of Ant-Powder, Rat-cake etc. to be explored in vulnerable boxes /cabins/ rooms/ signals etc. where such issues have been experienced in the past.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_9"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_9"
                    }
                ]
            },
            {
                "info": "Regular watch to be made in the vulnerable areas like Bridges, Ponds etc where Signalling equipments are likely to be affected.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_10"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_10"
                    }
                ]
            },
            {
                "info": "Provision of pumping sets of sufficient capacity to be done at vulnerable locations of water logging at identified locations where water logging was noticed during previous monsoon.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_11"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_11"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_11"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_11"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_11"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_11"
                    }
                ]
            },
            {
                "info": "After inspections, compliance from each sectional JE/SSE shall be obtained by the officer in charge. Sr. DSTEs shall send consolidated compliance of the Divisions to Head Quarter. Sr. DSTEs of Divisions, CSE and other Headquarters officers shall conduct surprise checks to confirm compliance of above instructions.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_12_12"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_12_12"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_12_12"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_12_12"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_12_12"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_12_12"
                    }
                ]
            }
        ]
    },
    {
        "heading": "MONSOON DRILL",
        "data": [
            {
                "info": "Drills to be conducted for all ESMs, JEs & SSEs in removal, replacing of point motors, detection assembly and clamping of points during flooding of tracks and it is to be recommended in register.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_13_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_13_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_13_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_13_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_13_0"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_13_0"
                    }
                ]
            },
            {
                "info": "Drills to be conducted for all ESMs, JEs & SSEs in case working conductors become defective and it is to be recommended in register.",
                "options": [
                    {
                        "type": "textbox",
                        "id": "t_no_use_13_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_13_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_13_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_rectified_date_13_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_balance_done_13_1"
                    },
                    {
                        "type": "textbox",
                        "id": "t_no_attend_cal_13_1"
                    }
                ]
            }
        ]
    }
];